<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::query()
            ->withCount('images')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(10);

        return view('pages.backend.galleries.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('pages.backend.galleries.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateGallery($request);

        $gallery = Gallery::create([
            'title' => $validated['title'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->storeGalleryImages($gallery, $request->file('gallery', []));

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Gallery created successfully.');
    }

    public function edit(Gallery $gallery): View
    {
        $gallery->load('images');

        return view('pages.backend.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $this->validateGallery($request, true);

        $gallery->update([
            'title' => $validated['title'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->removeGalleryImages($gallery, $validated['remove_gallery'] ?? []);
        $this->storeGalleryImages($gallery, $request->file('gallery', []));

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        foreach ($gallery->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $gallery->delete();

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Gallery deleted successfully.');
    }

    private function validateGallery(Request $request, bool $isUpdate = false): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:4096'],
        ];

        if ($isUpdate) {
            $rules['remove_gallery'] = ['nullable', 'array'];
            $rules['remove_gallery.*'] = ['integer', 'exists:gallery_images,id'];
        } else {
            $rules['gallery'][] = 'required';
            $rules['gallery'][] = 'min:1';
        }

        return $request->validate($rules);
    }

    private function storeGalleryImages(Gallery $gallery, array $files): void
    {
        $sortOrder = (int) $gallery->images()->max('sort_order');

        foreach ($files as $file) {
            if (! $file) {
                continue;
            }

            $sortOrder++;

            $gallery->images()->create([
                'image' => $file->store('galleries', 'public'),
                'sort_order' => $sortOrder,
            ]);
        }
    }

    private function removeGalleryImages(Gallery $gallery, array $imageIds): void
    {
        if ($imageIds === []) {
            return;
        }

        $images = GalleryImage::query()
            ->where('gallery_id', $gallery->id)
            ->whereIn('id', $imageIds)
            ->get();

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }
    }
}
