<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = Blog::query()
            ->with('categories')
            ->latest()
            ->paginate(10);

        return view('pages.backend.blogs.index', compact('blogs'));
    }

    public function create(): View
    {
        return view('pages.backend.blogs.create', $this->formOptions());
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateBlog($request);

        $blog = Blog::create([
            'title' => $validated['title'],
            'slug' => $this->resolveSlug($validated['slug'] ?? null, $validated['title']),
            'description' => $validated['description'] ?? null,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'keywords' => $validated['keywords'] ?? null,
            'image' => $request->hasFile('image')
                ? $request->file('image')->store('blogs', 'public')
                : null,
        ]);

        $blog->categories()->sync($validated['blog_categories'] ?? []);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog): View
    {
        $blog->load('categories');

        return view('pages.backend.blogs.edit', array_merge(
            compact('blog'),
            $this->formOptions()
        ));
    }

    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $validated = $this->validateBlog($request, $blog->id);

        $data = [
            'title' => $validated['title'],
            'slug' => $this->resolveSlug(
                $validated['slug'] ?? null,
                $validated['title'],
                $blog->id
            ),
            'description' => $validated['description'] ?? null,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'keywords' => $validated['keywords'] ?? null,
        ];

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);
        $blog->categories()->sync($validated['blog_categories'] ?? []);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    private function formOptions(): array
    {
        return [
            'blogCategories' => BlogCategory::query()
                ->orderBy('title')
                ->get(['id', 'title']),
        ];
    }

    private function validateBlog(Request $request, ?int $blogId = null): array
    {
        $slugRule = 'nullable|string|max:255|unique:blogs,slug';

        if ($blogId) {
            $slugRule .= ','.$blogId;
        }

        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => $slugRule,
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string', 'max:500'],
            'blog_categories' => ['nullable', 'array'],
            'blog_categories.*' => ['exists:blog_categories,id'],
        ]);
    }

    private function resolveSlug(?string $slug, string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $title);

        if ($baseSlug === '') {
            $baseSlug = 'blog-post';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            Blog::query()
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
