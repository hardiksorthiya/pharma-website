<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogCategoryController extends Controller
{
    public function index(): View
    {
        $categories = BlogCategory::query()
            ->latest()
            ->paginate(10);

        return view('pages.backend.blog-categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('pages.backend.blog-categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blog_categories,slug'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        $slug = $this->resolveSlug($validated['slug'] ?? null, $validated['title']);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('blog-categories', 'public')
            : null;

        BlogCategory::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('blog-categories.index')
            ->with('success', 'Blog category created successfully.');
    }

    public function edit(BlogCategory $blogCategory): View
    {
        return view('pages.backend.blog-categories.edit', [
            'category' => $blogCategory,
        ]);
    }

    public function update(Request $request, BlogCategory $blogCategory): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blog_categories,slug,'.$blogCategory->id],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        $slug = $this->resolveSlug(
            $validated['slug'] ?? null,
            $validated['title'],
            $blogCategory->id
        );

        $data = [
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
        ];

        if ($request->hasFile('image')) {
            if ($blogCategory->image) {
                Storage::disk('public')->delete($blogCategory->image);
            }

            $data['image'] = $request->file('image')->store('blog-categories', 'public');
        }

        $blogCategory->update($data);

        return redirect()
            ->route('blog-categories.index')
            ->with('success', 'Blog category updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory): RedirectResponse
    {
        if ($blogCategory->image) {
            Storage::disk('public')->delete($blogCategory->image);
        }

        $blogCategory->delete();

        return redirect()
            ->route('blog-categories.index')
            ->with('success', 'Blog category deleted successfully.');
    }

    private function resolveSlug(?string $slug, string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $title);

        if ($baseSlug === '') {
            $baseSlug = 'blog-category';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            BlogCategory::query()
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
