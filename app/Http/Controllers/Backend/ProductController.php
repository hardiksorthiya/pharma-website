<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DosageType;
use App\Models\Packing;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Specification;
use App\Models\TherapeuticClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with(['categories', 'dosageTypes'])
            ->latest()
            ->paginate(10);

        return view('pages.backend.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('pages.backend.products.create', $this->formOptions());
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);

        $product = Product::create([
            'sku' => $validated['sku'] ?? null,
            'title' => $validated['title'],
            'slug' => $this->resolveSlug($validated['slug'] ?? null, $validated['title']),
            'cas_no' => $validated['cas_no'] ?? null,
            'end_use' => $validated['end_use'] ?? null,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'keywords' => $validated['keywords'] ?? null,
            'feature_image' => $request->hasFile('feature_image')
                ? $request->file('feature_image')->store('products', 'public')
                : null,
        ]);

        $this->syncRelations($product, $validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product): View
    {
        $product->load([
            'categories',
            'dosageTypes',
            'therapeuticClasses',
            'packings',
            'specifications',
        ]);

        return view('pages.backend.products.edit', array_merge(
            $this->formOptions(),
            compact('product')
        ));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateProduct($request, $product->id);

        $data = [
            'sku' => $validated['sku'] ?? null,
            'title' => $validated['title'],
            'slug' => $this->resolveSlug(
                $validated['slug'] ?? null,
                $validated['title'],
                $product->id
            ),
            'cas_no' => $validated['cas_no'] ?? null,
            'end_use' => $validated['end_use'] ?? null,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'keywords' => $validated['keywords'] ?? null,
        ];

        if ($request->hasFile('feature_image')) {
            if ($product->feature_image) {
                Storage::disk('public')->delete($product->feature_image);
            }

            $data['feature_image'] = $request->file('feature_image')->store('products', 'public');
        }

        $product->update($data);
        $this->syncRelations($product, $validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->feature_image) {
            Storage::disk('public')->delete($product->feature_image);
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function downloadBulkTemplate(): Response
    {
        $headers = $this->bulkCsvHeaders();
        $sampleRows = [
            [
                'SKU-001',
                'Paracetamol API',
                'paracetamol-api',
                '103-90-2',
                'Used in pain relief and fever reduction formulations.',
                'Paracetamol API Supplier',
                'High-quality paracetamol active pharmaceutical ingredient.',
                'paracetamol, api, pain relief',
                'API|Intermediates',
                'Tablet|Capsule',
                'Analgesics',
                '25kg Drum|50kg Drum',
                'USP|EP',
            ],
            [
                'SKU-002',
                'Amoxicillin Trihydrate',
                '',
                '61336-28-9',
                'Broad-spectrum antibiotic intermediate.',
                'Amoxicillin Trihydrate',
                'Pharmaceutical grade amoxicillin trihydrate.',
                'amoxicillin, antibiotic',
                'API',
                'Capsule',
                'Antibiotics',
                '25kg Drum',
                'BP',
            ],
        ];

        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, $headers);

        foreach ($sampleRows as $row) {
            fputcsv($handle, $row);
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="products-bulk-import-sample.csv"',
        ]);
    }

    public function bulkImport(Request $request): RedirectResponse
    {
        $request->validate([
            'csv_file' => ['required', 'file', 'mimes:csv,txt', 'max:5120'],
        ]);

        $path = $request->file('csv_file')->getRealPath();
        $handle = fopen($path, 'r');

        if ($handle === false) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Unable to read the uploaded CSV file.');
        }

        $header = fgetcsv($handle);
        $expectedHeaders = $this->bulkCsvHeaders();

        if (! $this->csvHeadersMatch($header, $expectedHeaders)) {
            fclose($handle);

            return redirect()
                ->route('products.index')
                ->with('error', 'Invalid CSV format. Please download and use the sample CSV template.');
        }

        $created = 0;
        $updated = 0;
        $errors = [];
        $rowNumber = 1;

        while (($row = fgetcsv($handle)) !== false) {
            $rowNumber++;

            if ($this->isEmptyCsvRow($row)) {
                continue;
            }

            $data = $this->mapBulkCsvRow($row);

            if ($data['sku'] === '') {
                $errors[] = "Row {$rowNumber}: SKU is required.";

                continue;
            }

            if ($data['title'] === '') {
                $errors[] = "Row {$rowNumber}: Title is required.";

                continue;
            }

            try {
                $existingProduct = Product::query()
                    ->where('sku', $data['sku'])
                    ->first();

                $productData = [
                    'sku' => $data['sku'],
                    'title' => $data['title'],
                    'slug' => $this->resolveSlug(
                        $data['slug'] ?: null,
                        $data['title'],
                        $existingProduct?->id
                    ),
                    'cas_no' => $data['cas_no'] ?: null,
                    'end_use' => $data['end_use'] ?: null,
                    'meta_title' => $data['meta_title'] ?: null,
                    'meta_description' => $data['meta_description'] ?: null,
                    'keywords' => $data['keywords'] ?: null,
                ];

                if ($existingProduct) {
                    $existingProduct->update($productData);
                    $product = $existingProduct;
                    $updated++;
                } else {
                    $product = Product::create($productData);
                    $created++;
                }

                $this->syncRelations($product, [
                    'product_categories' => $this->resolveRelationIds(ProductCategory::class, 'title', $data['categories']),
                    'dosage_types' => $this->resolveRelationIds(DosageType::class, 'name', $data['dosage_types']),
                    'therapeutic_classes' => $this->resolveRelationIds(TherapeuticClass::class, 'name', $data['therapeutic_classes']),
                    'packings' => $this->resolveRelationIds(Packing::class, 'name', $data['packings']),
                    'specifications' => $this->resolveRelationIds(Specification::class, 'name', $data['specifications']),
                ]);
            } catch (\Throwable $exception) {
                $errors[] = "Row {$rowNumber}: {$exception->getMessage()}";
            }
        }

        fclose($handle);

        $message = "{$created} product(s) created, {$updated} product(s) updated.";

        if ($errors !== []) {
            return redirect()
                ->route('products.index')
                ->with('success', $message)
                ->with('import_errors', $errors);
        }

        return redirect()
            ->route('products.index')
            ->with('success', $message);
    }

    private function bulkCsvHeaders(): array
    {
        return [
            'sku',
            'title',
            'slug',
            'cas_no',
            'end_use',
            'meta_title',
            'meta_description',
            'keywords',
            'categories',
            'dosage_types',
            'therapeutic_classes',
            'packings',
            'specifications',
        ];
    }

    private function mapBulkCsvRow(array $row): array
    {
        $headers = $this->bulkCsvHeaders();
        $mapped = [];

        foreach ($headers as $index => $header) {
            $mapped[$header] = isset($row[$index]) ? trim((string) $row[$index]) : '';
        }

        return $mapped;
    }

    private function csvHeadersMatch(?array $header, array $expected): bool
    {
        if (! is_array($header)) {
            return false;
        }

        $normalizedHeader = array_map(
            fn ($value) => strtolower(trim((string) $value)),
            $header
        );

        $normalizedExpected = array_map(
            fn ($value) => strtolower(trim((string) $value)),
            $expected
        );

        return $normalizedHeader === $normalizedExpected;
    }

    private function isEmptyCsvRow(array $row): bool
    {
        foreach ($row as $value) {
            if (trim((string) $value) !== '') {
                return false;
            }
        }

        return true;
    }

    /**
     * @param  class-string  $modelClass
     */
    private function resolveRelationIds(string $modelClass, string $nameColumn, ?string $values): array
    {
        if (! $values) {
            return [];
        }

        $ids = [];

        foreach (explode('|', $values) as $name) {
            $name = trim($name);

            if ($name === '') {
                continue;
            }

            $record = $modelClass::query()
                ->whereRaw('LOWER('.$nameColumn.') = ?', [strtolower($name)])
                ->first();

            if ($record) {
                $ids[] = $record->id;
            }
        }

        return array_values(array_unique($ids));
    }

    private function formOptions(): array
    {
        return [
            'productCategories' => ProductCategory::query()->orderBy('title')->get(),
            'dosageTypes' => DosageType::query()->orderBy('name')->get(),
            'therapeuticClasses' => TherapeuticClass::query()->orderBy('name')->get(),
            'packings' => Packing::query()->orderBy('name')->get(),
            'specifications' => Specification::query()->orderBy('name')->get(),
        ];
    }

    private function validateProduct(Request $request, ?int $productId = null): array
    {
        $skuRule = 'nullable|string|max:255|unique:products,sku';

        if ($productId) {
            $skuRule .= ','.$productId;
        }

        $slugRule = 'nullable|string|max:255|unique:products,slug';

        if ($productId) {
            $slugRule .= ','.$productId;
        }

        return $request->validate([
            'sku' => $skuRule,
            'title' => ['required', 'string', 'max:255'],
            'slug' => $slugRule,
            'cas_no' => ['nullable', 'string', 'max:255'],
            'end_use' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string', 'max:500'],
            'feature_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'product_categories' => ['nullable', 'array'],
            'product_categories.*' => ['exists:product_categories,id'],
            'dosage_types' => ['nullable', 'array'],
            'dosage_types.*' => ['exists:dosage_types,id'],
            'therapeutic_classes' => ['nullable', 'array'],
            'therapeutic_classes.*' => ['exists:therapeutic_classes,id'],
            'packings' => ['nullable', 'array'],
            'packings.*' => ['exists:packings,id'],
            'specifications' => ['nullable', 'array'],
            'specifications.*' => ['exists:specifications,id'],
        ]);
    }

    private function syncRelations(Product $product, array $validated): void
    {
        $product->categories()->sync($validated['product_categories'] ?? []);
        $product->dosageTypes()->sync($validated['dosage_types'] ?? []);
        $product->therapeuticClasses()->sync($validated['therapeutic_classes'] ?? []);
        $product->packings()->sync($validated['packings'] ?? []);
        $product->specifications()->sync($validated['specifications'] ?? []);
    }

    private function resolveSlug(?string $slug, string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $title);

        if ($baseSlug === '') {
            $baseSlug = 'product';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            Product::query()
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->where('slug', $uniqueSlug)
                ->exists()
        ) {
            $uniqueSlug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $uniqueSlug;
    }
}
