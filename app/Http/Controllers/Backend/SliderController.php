<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SliderController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(10);

        return view('pages.backend.sliders.index', compact('sliders'));
    }

    public function create(): View
    {
        return view('pages.backend.sliders.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateSlider($request);

        Slider::create([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'description' => $validated['description'] ?? null,
            'button_text' => $validated['button_text'] ?? null,
            'button_link' => $validated['button_link'] ?? null,
            'background_type' => $validated['background_type'],
            'background_image' => $this->storeBackgroundImage($request),
            'background_video' => $this->storeBackgroundVideo($request),
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider): View
    {
        return view('pages.backend.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider): RedirectResponse
    {
        $validated = $this->validateSlider($request, $slider);

        $backgroundImage = $slider->background_image;
        $backgroundVideo = $slider->background_video;

        if ($request->boolean('remove_background_image') && $backgroundImage) {
            Storage::disk('public')->delete($backgroundImage);
            $backgroundImage = null;
        }

        if ($request->boolean('remove_background_video') && $backgroundVideo) {
            Storage::disk('public')->delete($backgroundVideo);
            $backgroundVideo = null;
        }

        if ($request->hasFile('background_image')) {
            if ($backgroundImage) {
                Storage::disk('public')->delete($backgroundImage);
            }

            $backgroundImage = $this->storeBackgroundImage($request);
        }

        if ($request->hasFile('background_video')) {
            if ($backgroundVideo) {
                Storage::disk('public')->delete($backgroundVideo);
            }

            $backgroundVideo = $this->storeBackgroundVideo($request);
        }

        if ($validated['background_type'] === 'image' && $backgroundVideo) {
            Storage::disk('public')->delete($backgroundVideo);
            $backgroundVideo = null;
        }

        if ($validated['background_type'] === 'video' && $backgroundImage === null && ! $request->hasFile('background_image')) {
            // Video slides can keep optional poster image only.
        }

        $slider->update([
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'description' => $validated['description'] ?? null,
            'button_text' => $validated['button_text'] ?? null,
            'button_link' => $validated['button_link'] ?? null,
            'background_type' => $validated['background_type'],
            'background_image' => $backgroundImage,
            'background_video' => $backgroundVideo,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        if ($slider->background_image) {
            Storage::disk('public')->delete($slider->background_image);
        }

        if ($slider->background_video) {
            Storage::disk('public')->delete($slider->background_video);
        }

        $slider->delete();

        return redirect()
            ->route('sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }

    private function validateSlider(Request $request, ?Slider $slider = null): array
    {
        $isUpdate = $slider !== null;
        $backgroundType = $request->input('background_type', $slider?->background_type ?? 'image');

        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_link' => ['nullable', 'string', 'max:255'],
            'background_type' => ['required', Rule::in(['image', 'video'])],
            'background_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:4096'],
            'background_video' => ['nullable', 'mimes:mp4,webm', 'max:51200'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'remove_background_image' => ['nullable', 'boolean'],
            'remove_background_video' => ['nullable', 'boolean'],
        ];

        if (! $isUpdate) {
            if ($backgroundType === 'image') {
                $rules['background_image'][] = 'required';
            }

            if ($backgroundType === 'video') {
                $rules['background_video'][] = 'required';
            }
        } else {
            if ($backgroundType === 'image' && ! $slider->background_image) {
                $rules['background_image'][] = 'required_without:remove_background_image';
            }

            if ($backgroundType === 'video' && ! $slider->background_video) {
                $rules['background_video'][] = 'required_without:remove_background_video';
            }
        }

        return $request->validate($rules);
    }

    private function storeBackgroundImage(Request $request): ?string
    {
        if (! $request->hasFile('background_image')) {
            return null;
        }

        return $request->file('background_image')->store('sliders/images', 'public');
    }

    private function storeBackgroundVideo(Request $request): ?string
    {
        if (! $request->hasFile('background_video')) {
            return null;
        }

        return $request->file('background_video')->store('sliders/videos', 'public');
    }
}
