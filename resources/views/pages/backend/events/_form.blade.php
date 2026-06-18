@php
    $event = $event ?? null;
@endphp

<div class="row">
    <div class="col-lg-8">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Basic Information</h5>

            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    value="{{ old('title', $event?->title) }}"
                    required>
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="event_date">Event Date <span class="text-danger">*</span></label>
                <input type="date"
                    class="form-control @error('event_date') is-invalid @enderror"
                    id="event_date"
                    name="event_date"
                    value="{{ old('event_date', $event?->event_date?->format('Y-m-d')) }}"
                    required>
                @error('event_date')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-0">
                <label for="description">Description</label>
                <textarea
                    class="form-control admin-event-editor @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                    rows="10">{!! old('description', $event?->description) !!}</textarea>
                <small class="form-text text-muted">Supports rich text and HTML formatting.</small>
                @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-form-section mb-0">
            <h5 class="admin-form-section-title">Gallery</h5>

            @if ($event?->images->isNotEmpty())
                <div class="admin-gallery-grid mb-3">
                    @foreach ($event->images as $image)
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
                <label for="gallery">Upload Images</label>
                <input type="file"
                    class="form-control-file admin-file-input @error('gallery') is-invalid @enderror @error('gallery.*') is-invalid @enderror"
                    id="gallery"
                    name="gallery[]"
                    accept="image/jpeg,image/jpg,image/png,image/webp"
                    multiple>
                <small class="form-text text-muted">Optional. JPG, PNG or WEBP. Max 2MB each. Select multiple files.</small>
                @error('gallery')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                @error('gallery.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
