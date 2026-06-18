<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::query()
            ->withCount('images')
            ->orderByDesc('event_date')
            ->paginate(10);

        return view('pages.backend.events.index', compact('events'));
    }

    public function create(): View
    {
        return view('pages.backend.events.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateEvent($request);

        $event = Event::create([
            'title' => $validated['title'],
            'slug' => $this->resolveSlug($validated['title']),
            'description' => $validated['description'] ?? null,
            'event_date' => $validated['event_date'],
        ]);

        $this->storeGalleryImages($event, $request->file('gallery', []));

        return redirect()
            ->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    public function edit(Event $event): View
    {
        $event->load('images');

        return view('pages.backend.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $validated = $this->validateEvent($request, true);

        $event->update([
            'title' => $validated['title'],
            'slug' => $this->resolveSlug($validated['title'], $event->id),
            'description' => $validated['description'] ?? null,
            'event_date' => $validated['event_date'],
        ]);

        $this->removeGalleryImages($event, $validated['remove_gallery'] ?? []);
        $this->storeGalleryImages($event, $request->file('gallery', []));

        return redirect()
            ->route('events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        foreach ($event->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }

    private function validateEvent(Request $request, bool $isUpdate = false): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'event_date' => ['required', 'date'],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ];

        if ($isUpdate) {
            $rules['remove_gallery'] = ['nullable', 'array'];
            $rules['remove_gallery.*'] = ['integer', 'exists:event_images,id'];
        }

        return $request->validate($rules);
    }

    private function storeGalleryImages(Event $event, array $files): void
    {
        $sortOrder = (int) $event->images()->max('sort_order');

        foreach ($files as $file) {
            if (! $file) {
                continue;
            }

            $sortOrder++;

            $event->images()->create([
                'image' => $file->store('events/gallery', 'public'),
                'sort_order' => $sortOrder,
            ]);
        }
    }

    private function removeGalleryImages(Event $event, array $imageIds): void
    {
        if ($imageIds === []) {
            return;
        }

        $images = EventImage::query()
            ->where('event_id', $event->id)
            ->whereIn('id', $imageIds)
            ->get();

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }
    }

    private function resolveSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);

        if ($baseSlug === '') {
            $baseSlug = 'event';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            Event::query()
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
