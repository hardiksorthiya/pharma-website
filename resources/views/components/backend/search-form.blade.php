@props([
    'placeholder' => 'Search...',
    'value' => '',
])

<form method="GET" class="admin-search-form mb-4">
    <div class="input-group">
        <input type="search"
            name="search"
            class="form-control"
            placeholder="{{ $placeholder }}"
            value="{{ $value }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-auth">Search</button>
            @if ($value)
                <a href="{{ url()->current() }}" class="btn btn-auth-outline btn-outline-secondary">Clear</a>
            @endif
        </div>
    </div>
</form>
