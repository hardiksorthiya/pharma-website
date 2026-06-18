@php
    $blog = $blog ?? null;
    $selectedCategories = old('blog_categories', $blog ? $blog->categories->pluck('id')->all() : []);
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
                    value="{{ old('title', $blog?->title) }}"
                    required>
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text"
                    class="form-control @error('slug') is-invalid @enderror"
                    id="slug"
                    name="slug"
                    value="{{ old('slug', $blog?->slug) }}"
                    placeholder="Auto-generated from title if left empty">
                @error('slug')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-0">
                <label for="description">Description</label>
                <textarea
                    class="form-control admin-blog-editor @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                    rows="10">{!! old('description', $blog?->description) !!}</textarea>
                <small class="form-text text-muted">Supports rich text and HTML formatting.</small>
                @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="admin-form-section">
            <h5 class="admin-form-section-title">SEO</h5>

            <div class="form-group">
                <label for="meta_title">Meta Title</label>
                <input type="text"
                    class="form-control @error('meta_title') is-invalid @enderror"
                    id="meta_title"
                    name="meta_title"
                    value="{{ old('meta_title', $blog?->meta_title) }}">
                @error('meta_title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="meta_description">Meta Description</label>
                <textarea
                    class="form-control admin-textarea @error('meta_description') is-invalid @enderror"
                    id="meta_description"
                    name="meta_description"
                    rows="3">{{ old('meta_description', $blog?->meta_description) }}</textarea>
                @error('meta_description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-0">
                <label for="keywords">Keywords</label>
                <input type="text"
                    class="form-control @error('keywords') is-invalid @enderror"
                    id="keywords"
                    name="keywords"
                    value="{{ old('keywords', $blog?->keywords) }}"
                    placeholder="Comma separated keywords">
                @error('keywords')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Blog Categories</h5>

            <x-backend.checkbox-multiselect
                id="blog_categories"
                name="blog_categories"
                label="Categories"
                :items="$blogCategories ?? []"
                label-key="title"
                :selected="$selectedCategories"
                placeholder="Select blog categories"
                class="mb-0" />
        </div>

        <div class="admin-form-section">
            <h5 class="admin-form-section-title">Feature Image</h5>

            @if ($blog?->image)
                <div class="admin-image-preview mb-3">
                    <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}">
                </div>
            @endif

            <div class="form-group mb-0">
                <input type="file"
                    class="form-control-file admin-file-input @error('image') is-invalid @enderror"
                    id="image"
                    name="image"
                    accept="image/jpeg,image/jpg,image/png,image/webp">
                <small class="form-text text-muted">Optional. JPG, PNG or WEBP. Max 2MB.</small>
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
