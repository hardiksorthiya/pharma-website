<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $subCategories = ProductSubCategory::query()
            ->with('category')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhereHas('category', fn ($query) => $query->where('title', 'like', "%{$search}%"));
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.backend.sub-categories.index', compact('subCategories', 'search'));
    }

    public function create(): View
    {
        return view('pages.backend.sub-categories.create', $this->formOptions());
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_category_id' => ['required', 'exists:product_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:product_sub_categories,slug'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        ProductSubCategory::create([
            'product_category_id' => $validated['product_category_id'],
            'title' => $validated['title'],
            'slug' => $this->resolveSlug($validated['slug'] ?? null, $validated['title']),
            'description' => $validated['description'] ?? null,
            'image' => $request->hasFile('image')
                ? $request->file('image')->store('product-sub-categories', 'public')
                : null,
        ]);

        return redirect()
            ->route('product-sub-categories.index')
            ->with('success', 'Product sub category created successfully.');
    }

    public function edit(ProductSubCategory $subCategory): View
    {
        return view('pages.backend.sub-categories.edit', array_merge(
            $this->formOptions(),
            compact('subCategory')
        ));
    }

    public function update(Request $request, ProductSubCategory $subCategory): RedirectResponse
    {
        $validated = $request->validate([
            'product_category_id' => ['required', 'exists:product_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:product_sub_categories,slug,'.$subCategory->id],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        $data = [
            'product_category_id' => $validated['product_category_id'],
            'title' => $validated['title'],
            'slug' => $this->resolveSlug(
                $validated['slug'] ?? null,
                $validated['title'],
                $subCategory->id
            ),
            'description' => $validated['description'] ?? null,
        ];

        if ($request->hasFile('image')) {
            if ($subCategory->image) {
                Storage::disk('public')->delete($subCategory->image);
            }

            $data['image'] = $request->file('image')->store('product-sub-categories', 'public');
        }

        $subCategory->update($data);

        return redirect()
            ->route('product-sub-categories.index')
            ->with('success', 'Product sub category updated successfully.');
    }

    public function destroy(ProductSubCategory $subCategory): RedirectResponse
    {
        if ($subCategory->image) {
            Storage::disk('public')->delete($subCategory->image);
        }

        $subCategory->delete();

        return redirect()
            ->route('product-sub-categories.index')
            ->with('success', 'Product sub category deleted successfully.');
    }

    private function formOptions(): array
    {
        return [
            'productCategories' => ProductCategory::query()->orderBy('title')->get(),
        ];
    }

    private function resolveSlug(?string $slug, string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $title);

        if ($baseSlug === '') {
            $baseSlug = 'sub-category';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            ProductSubCategory::query()
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
