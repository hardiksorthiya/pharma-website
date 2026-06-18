@php
    $dosageType = $dosageType ?? null;
@endphp

<div class="form-group">
    <label for="name">Name <span class="text-danger">*</span></label>
    <input type="text"
        class="form-control @error('name') is-invalid @enderror"
        id="name"
        name="name"
        value="{{ old('name', $dosageType?->name) }}"
        required>
    @error('name')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-0">
    <label for="slug">Slug</label>
    <input type="text"
        class="form-control @error('slug') is-invalid @enderror"
        id="slug"
        name="slug"
        value="{{ old('slug', $dosageType?->slug) }}"
        placeholder="Auto-generated from name if left empty">
    @error('slug')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
