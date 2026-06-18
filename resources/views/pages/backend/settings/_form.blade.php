@php
    $settings = $settings ?? null;
@endphp

<div class="row">
    <div class="col-lg-6">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Branding</h5>

            <div class="form-group">
                <label for="logo">Website Logo</label>
                @if ($settings?->logo)
                    <div class="admin-image-preview mb-3 admin-image-preview--logo">
                        <img src="{{ $settings->logo_url }}" alt="Current logo">
                    </div>
                @endif
                <input type="file"
                    class="form-control-file admin-file-input @error('logo') is-invalid @enderror"
                    id="logo"
                    name="logo"
                    accept="image/jpeg,image/jpg,image/png,image/webp,image/svg+xml">
                <small class="form-text text-muted">Recommended: PNG or SVG with transparent background. Max 2MB.</small>
                @error('logo')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-0">
                <label for="favicon">Favicon</label>
                @if ($settings?->favicon)
                    <div class="admin-image-preview mb-3 admin-image-preview--favicon">
                        <img src="{{ $settings->favicon_url }}" alt="Current favicon">
                    </div>
                @endif
                <input type="file"
                    class="form-control-file admin-file-input @error('favicon') is-invalid @enderror"
                    id="favicon"
                    name="favicon"
                    accept="image/jpeg,image/jpg,image/png,image/webp,image/x-icon,image/vnd.microsoft.icon,image/svg+xml">
                <small class="form-text text-muted">ICO, PNG, or SVG. Max 1MB. Square image works best.</small>
                @error('favicon')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="admin-form-section mb-4">
            <h5 class="admin-form-section-title">Contact Information</h5>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text"
                    class="form-control @error('phone') is-invalid @enderror"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $settings?->phone) }}"
                    placeholder="+91 98765 43210">
                @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    value="{{ old('email', $settings?->email) }}"
                    placeholder="info@sanskrutipharma.com">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-0">
                <label for="address">Address</label>
                <textarea
                    class="form-control admin-textarea @error('address') is-invalid @enderror"
                    id="address"
                    name="address"
                    rows="4"
                    placeholder="Company name, street, city, state, country">{{ old('address', $settings?->address) }}</textarea>
                @error('address')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="admin-form-section mb-0">
            <h5 class="admin-form-section-title">Google Map</h5>

            <div class="form-group mb-0">
                <label for="map_embed_url">Map Embed URL or Iframe Code</label>
                <textarea
                    class="form-control admin-textarea @error('map_embed_url') is-invalid @enderror"
                    id="map_embed_url"
                    name="map_embed_url"
                    rows="4"
                    placeholder="Paste the Google Maps embed URL or full iframe code">{{ old('map_embed_url', $settings?->map_embed_url) }}</textarea>
                <small class="form-text text-muted">
                    In Google Maps, click Share → Embed a map, then copy the iframe code or the <code>src</code> URL.
                </small>
                @error('map_embed_url')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
