@props([
    'name',
    'id',
    'label',
    'items' => [],
    'valueKey' => 'id',
    'labelKey' => 'name',
    'selected' => [],
    'placeholder' => 'Select options',
])

@php
    $selected = array_map('strval', (array) $selected);
@endphp

<div {{ $attributes->merge(['class' => 'frontend-checkbox-multiselect']) }}
    data-checkbox-multiselect
    data-placeholder="{{ $placeholder }}">
    <label class="contact-label frontend-checkbox-multiselect-label" for="{{ $id }}-toggle">{{ $label }}</label>

    <button type="button"
        class="frontend-checkbox-multiselect-toggle @error($name) is-invalid @enderror"
        id="{{ $id }}-toggle"
        data-multiselect-toggle
        aria-haspopup="listbox"
        aria-expanded="false">
        <span class="frontend-checkbox-multiselect-text is-placeholder" data-multiselect-label>{{ $placeholder }}</span>
        <span class="frontend-checkbox-multiselect-arrow" data-multiselect-arrow aria-hidden="true"></span>
    </button>

    <div class="frontend-checkbox-multiselect-menu" data-multiselect-menu role="listbox" aria-label="{{ $label }}">
        @if (count($items))
            <div class="frontend-checkbox-multiselect-search-wrap">
                <input type="text"
                    class="frontend-checkbox-multiselect-search"
                    data-multiselect-search
                    placeholder="Search {{ strtolower($label) }}..."
                    autocomplete="off"
                    aria-label="Search {{ $label }}">
            </div>

            <div class="frontend-checkbox-multiselect-options" data-multiselect-options>
                @foreach ($items as $item)
                    @php
                        $value = is_array($item) ? $item[$valueKey] : $item->{$valueKey};
                        $text = is_array($item) ? $item[$labelKey] : $item->{$labelKey};
                    @endphp
                    <label class="frontend-checkbox-multiselect-option" data-multiselect-option>
                        <input type="checkbox"
                            name="{{ $name }}[]"
                            value="{{ $value }}"
                            @checked(in_array((string) $value, $selected, true))>
                        <span class="frontend-checkbox-multiselect-check" aria-hidden="true"></span>
                        <span class="frontend-checkbox-multiselect-option-text" data-multiselect-option-text>{{ $text }}</span>
                    </label>
                @endforeach
            </div>

            <div class="frontend-checkbox-multiselect-no-results" data-multiselect-no-results hidden>No results found.</div>
        @else
            <div class="frontend-checkbox-multiselect-empty">No options available.</div>
        @endif
    </div>

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
