@php
    $product = $product ?? null;
    $selectedCategories = old('product_categories', $product ? $product->categories->pluck('id')->all() : []);
    $selectedDosageTypes = old('dosage_types', $product ? $product->dosageTypes->pluck('id')->all() : []);
    $selectedTherapeuticClasses = old('therapeutic_classes', $product ? $product->therapeuticClasses->pluck('id')->all() : []);
    $selectedPackings = old('packings', $product ? $product->packings->pluck('id')->all() : []);
    $selectedSpecifications = old('specifications', $product ? $product->specifications->pluck('id')->all() : []);
@endphp

<div class="row">
    <div class="col-lg-8">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Basic Information</h5>

            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text"
                    class="form-control @error('sku') is-invalid @enderror"
                    id="sku"
                    name="sku"
                    value="{{ old('sku', $product?->sku) }}"
                    placeholder="e.g. SKU-001">
                @error('sku')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    value="{{ old('title', $product?->title) }}"
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
                    value="{{ old('slug', $product?->slug) }}"
                    placeholder="Auto-generated from title if left empty">
                @error('slug')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cas_no">CAS No.</label>
                <input type="text"
                    class="form-control @error('cas_no') is-invalid @enderror"
                    id="cas_no"
                    name="cas_no"
                    value="{{ old('cas_no', $product?->cas_no) }}"
                    placeholder="e.g. 50-78-2">
                @error('cas_no')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-0">
                <label for="end_use">End Use</label>
                <textarea
                    class="form-control admin-textarea @error('end_use') is-invalid @enderror"
                    id="end_use"
                    name="end_use"
                    rows="4"
                    placeholder="Describe the end use of this product">{{ old('end_use', $product?->end_use) }}</textarea>
                @error('end_use')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Classifications</h5>

            <x-backend.checkbox-multiselect
                id="product_categories"
                name="product_categories"
                label="Product Categories"
                :items="$productCategories"
                label-key="title"
                :selected="$selectedCategories"
                placeholder="Select product categories" />

            <x-backend.checkbox-multiselect
                id="dosage_types"
                name="dosage_types"
                label="Dosage Types"
                :items="$dosageTypes"
                :selected="$selectedDosageTypes"
                placeholder="Select dosage types" />

            <x-backend.checkbox-multiselect
                id="therapeutic_classes"
                name="therapeutic_classes"
                label="Therapeutic Classes"
                :items="$therapeuticClasses"
                :selected="$selectedTherapeuticClasses"
                placeholder="Select therapeutic classes" />

            <x-backend.checkbox-multiselect
                id="packings"
                name="packings"
                label="Packings"
                :items="$packings"
                :selected="$selectedPackings"
                placeholder="Select packings" />

            <x-backend.checkbox-multiselect
                id="specifications"
                name="specifications"
                label="Specifications"
                :items="$specifications"
                :selected="$selectedSpecifications"
                placeholder="Select specifications"
                class="mb-0" />
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Feature Image</h5>

            @if ($product?->feature_image)
                <div class="admin-image-preview mb-3">
                    <img src="{{ $product->feature_image_url }}" alt="{{ $product->title }}">
                </div>
            @endif

            <div class="form-group mb-0">
                <input type="file"
                    class="form-control-file admin-file-input @error('feature_image') is-invalid @enderror"
                    id="feature_image"
                    name="feature_image"
                    accept="image/jpeg,image/jpg,image/png,image/webp">
                <small class="form-text text-muted">Optional. JPG, PNG or WEBP. Max 2MB.</small>
                @error('feature_image')
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
                    value="{{ old('meta_title', $product?->meta_title) }}">
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
                    rows="3">{{ old('meta_description', $product?->meta_description) }}</textarea>
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
                    value="{{ old('keywords', $product?->keywords) }}"
                    placeholder="Comma separated keywords">
                @error('keywords')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
