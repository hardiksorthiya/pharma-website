@php
    $gallery = $gallery ?? null;
@endphp

<div class="row">
    <div class="col-lg-8">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Gallery Information</h5>

            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    value="{{ old('title', $gallery?->title) }}"
                    placeholder="e.g. Culture, Ganesh"
                    required>
                <small class="form-text text-muted">This title is shown above the images on the gallery page.</small>
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-0">
                <label for="sort_order">Sort Order</label>
                <input type="number"
                    class="form-control @error('sort_order') is-invalid @enderror"
                    id="sort_order"
                    name="sort_order"
                    min="0"
                    value="{{ old('sort_order', $gallery?->sort_order ?? 0) }}">
                <small class="form-text text-muted">Lower numbers appear first on the gallery page.</small>
                @error('sort_order')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Images</h5>

            @if ($gallery?->images->isNotEmpty())
                <div class="admin-gallery-grid mb-3">
                    @foreach ($gallery->images as $image)
                        <label class="admin-gallery-item">
                            <input type="checkbox"
                                name="remove_gallery[]"
                                value="{{ $image->id }}"
                                {{ in_array($image->id, old('remove_gallery', [])) ? 'checked' : '' }}>
                            <img src="{{ $image->image_url }}" alt="Gallery image">
                            <span class="admin-gallery-remove">Remove</span>
                        </label>
                    @endforeach
                </div>
                <small class="form-text text-muted d-block mb-3">Check images to remove them on save.</small>
            @endif

            <div class="form-group mb-0">
                <label for="gallery">Upload Images <span class="text-danger">{{ $gallery ? '' : '*' }}</span></label>
                <input type="file"
                    class="form-control-file admin-file-input @error('gallery') is-invalid @enderror @error('gallery.*') is-invalid @enderror"
                    id="gallery"
                    name="gallery[]"
                    accept="image/jpeg,image/jpg,image/png,image/webp"
                    multiple
                    {{ $gallery ? '' : 'required' }}>
                <small class="form-text text-muted">JPG, PNG or WEBP. Max 4MB each. Select multiple files.</small>
                @error('gallery')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                @error('gallery.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="admin-form-section mb-0">
            <h5 class="admin-form-section-title">Display</h5>
            <div class="custom-control custom-checkbox mb-0">
                <input type="checkbox"
                    class="custom-control-input"
                    id="is_active"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $gallery?->is_active ?? true) ? 'checked' : '' }}>
                <label class="custom-control-label" for="is_active">Show on gallery page</label>
            </div>
        </div>
    </div>
</div>
