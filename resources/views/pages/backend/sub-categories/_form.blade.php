@php
    $subCategory = $subCategory ?? null;
@endphp

<div class="form-group">
    <label for="product_category_id">Product Category <span class="text-danger">*</span></label>
    <select
        class="form-control @error('product_category_id') is-invalid @enderror"
        id="product_category_id"
        name="product_category_id"
        required>
        <option value="">Select category</option>
        @foreach ($productCategories as $productCategory)
            <option value="{{ $productCategory->id }}"
                @selected((string) old('product_category_id', $subCategory?->product_category_id) === (string) $productCategory->id)>
                {{ $productCategory->title }}
            </option>
        @endforeach
    </select>
    @error('product_category_id')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="title">Title <span class="text-danger">*</span></label>
    <input type="text"
        class="form-control @error('title') is-invalid @enderror"
        id="title"
        name="title"
        value="{{ old('title', $subCategory?->title) }}"
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
        value="{{ old('slug', $subCategory?->slug) }}"
        placeholder="Auto-generated from title if left empty">
    @error('slug')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea
        class="form-control admin-textarea @error('description') is-invalid @enderror"
        id="description"
        name="description"
        rows="5">{{ old('description', $subCategory?->description) }}</textarea>
    @error('description')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-0">
    <label for="image">Image</label>
    @if ($subCategory?->image)
        <div class="admin-image-preview mb-3">
            <img src="{{ $subCategory->image_url }}" alt="{{ $subCategory->title }}">
        </div>
    @endif
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
