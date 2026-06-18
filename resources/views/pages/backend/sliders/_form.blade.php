@php
    $slider = $slider ?? null;
    $backgroundType = old('background_type', $slider?->background_type ?? 'image');
@endphp

<div class="row">
    <div class="col-lg-8">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Slide Content</h5>

            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    value="{{ old('title', $slider?->title) }}"
                    required>
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text"
                    class="form-control @error('subtitle') is-invalid @enderror"
                    id="subtitle"
                    name="subtitle"
                    value="{{ old('subtitle', $slider?->subtitle) }}">
                <small class="form-text text-muted">Shown as the small badge above the title on the homepage.</small>
                @error('subtitle')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    class="form-control @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                    rows="5">{{ old('description', $slider?->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="button_text">Button Text</label>
                        <input type="text"
                            class="form-control @error('button_text') is-invalid @enderror"
                            id="button_text"
                            name="button_text"
                            value="{{ old('button_text', $slider?->button_text) }}">
                        @error('button_text')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="button_link">Button Link</label>
                        <input type="text"
                            class="form-control @error('button_link') is-invalid @enderror"
                            id="button_link"
                            name="button_link"
                            value="{{ old('button_link', $slider?->button_link) }}"
                            placeholder="/products or https://example.com">
                        @error('button_link')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Background</h5>

            <div class="form-group">
                <label for="background_type">Background Type <span class="text-danger">*</span></label>
                <select class="form-control @error('background_type') is-invalid @enderror"
                    id="background_type"
                    name="background_type"
                    required>
                    <option value="image" {{ $backgroundType === 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ $backgroundType === 'video' ? 'selected' : '' }}>Video</option>
                </select>
                @error('background_type')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            @if ($slider?->background_image_url)
                <div class="mb-3" id="sliderCurrentImageWrap">
                    <img src="{{ $slider->background_image_url }}" alt="Current background image" class="img-fluid rounded border">
                    <div class="custom-control custom-checkbox mt-2">
                        <input type="checkbox"
                            class="custom-control-input"
                            id="remove_background_image"
                            name="remove_background_image"
                            value="1"
                            {{ old('remove_background_image') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remove_background_image">Remove current image</label>
                    </div>
                </div>
            @endif

            <div class="form-group" id="sliderImageField">
                <label for="background_image">Background Image</label>
                <input type="file"
                    class="form-control-file admin-file-input @error('background_image') is-invalid @enderror"
                    id="background_image"
                    name="background_image"
                    accept="image/jpeg,image/jpg,image/png,image/webp">
                <small class="form-text text-muted">JPG, PNG or WEBP. Max 4MB. For video slides, this can be used as the poster image.</small>
                @error('background_image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            @if ($slider?->background_video_url)
                <div class="mb-3" id="sliderCurrentVideoWrap">
                    <video class="w-100 rounded border" controls muted>
                        <source src="{{ $slider->background_video_url }}" type="video/mp4">
                    </video>
                    <div class="custom-control custom-checkbox mt-2">
                        <input type="checkbox"
                            class="custom-control-input"
                            id="remove_background_video"
                            name="remove_background_video"
                            value="1"
                            {{ old('remove_background_video') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remove_background_video">Remove current video</label>
                    </div>
                </div>
            @endif

            <div class="form-group mb-0" id="sliderVideoField">
                <label for="background_video">Background Video</label>
                <input type="file"
                    class="form-control-file admin-file-input @error('background_video') is-invalid @enderror"
                    id="background_video"
                    name="background_video"
                    accept="video/mp4,video/webm">
                <small class="form-text text-muted">MP4 or WEBM. Max 50MB.</small>
                @error('background_video')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="admin-form-section mb-0">
            <h5 class="admin-form-section-title">Display</h5>

            <div class="form-group">
                <label for="sort_order">Sort Order</label>
                <input type="number"
                    class="form-control @error('sort_order') is-invalid @enderror"
                    id="sort_order"
                    name="sort_order"
                    min="0"
                    value="{{ old('sort_order', $slider?->sort_order ?? 0) }}">
                <small class="form-text text-muted">Lower numbers appear first in the homepage slider.</small>
                @error('sort_order')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="custom-control custom-checkbox mb-0">
                <input type="checkbox"
                    class="custom-control-input"
                    id="is_active"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $slider?->is_active ?? true) ? 'checked' : '' }}>
                <label class="custom-control-label" for="is_active">Active on homepage</label>
            </div>
        </div>
    </div>
</div>
