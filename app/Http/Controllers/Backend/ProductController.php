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
        $slugRule = 'nullable|string|max:255|unique:products,slug';

        if ($productId) {
            $slugRule .= ','.$productId;
        }

        return $request->validate([
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
