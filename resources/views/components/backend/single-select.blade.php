@props([
    'name',
    'id',
    'label',
    'items' => [],
    'valueKey' => 'id',
    'labelKey' => 'name',
    'selected' => null,
    'placeholder' => 'Select option',
    'required' => false,
])

@php
    $selectedValue = old($name, $selected);
    $selectedValue = $selectedValue !== null && $selectedValue !== '' ? (string) $selectedValue : '';
    $selectedLabel = $placeholder;
    $hasItems = count($items) > 0;

    foreach ($items as $item) {
        $value = is_array($item) ? $item[$valueKey] : $item->{$valueKey};
        $text = is_array($item) ? $item[$labelKey] : $item->{$labelKey};

        if ((string) $value === $selectedValue) {
            $selectedLabel = $text;
            break;
        }
    }
@endphp

<div {{ $attributes->merge(['class' => 'admin-checkbox-multiselect admin-single-select form-group']) }}
    data-single-select
    data-placeholder="{{ $placeholder }}"
    id="{{ $id }}-wrapper">
    <label class="admin-checkbox-multiselect-field-label" for="{{ $id }}-toggle">{{ $label }}</label>

    <button type="button"
        class="admin-checkbox-multiselect-toggle @error($name) is-invalid @enderror"
        id="{{ $id }}-toggle"
        data-single-select-toggle
        aria-haspopup="listbox"
        aria-expanded="false">
        <span class="admin-checkbox-multiselect-text {{ $selectedValue === '' ? 'is-placeholder' : '' }}" data-single-select-label>{{ $selectedLabel }}</span>
        <span class="admin-checkbox-multiselect-arrow" aria-hidden="true"></span>
    </button>

    <input type="hidden"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $selectedValue }}"
        data-single-select-input
        @if ($required) data-required="true" @endif>

    <div class="admin-checkbox-multiselect-menu" data-single-select-menu role="listbox" aria-label="{{ $label }}">
        <div class="admin-checkbox-multiselect-search-wrap" @if (! $hasItems) style="display: none;" @endif>
            <input type="text"
                class="admin-checkbox-multiselect-search"
                data-single-select-search
                placeholder="Search {{ strtolower($label) }}..."
                autocomplete="off"
                aria-label="Search {{ $label }}">
        </div>

        <div class="admin-single-select-options" data-single-select-options>
            @foreach ($items as $item)
                @php
                    $value = is_array($item) ? $item[$valueKey] : $item->{$valueKey};
                    $text = is_array($item) ? $item[$labelKey] : $item->{$labelKey};
                @endphp
                <button type="button"
                    class="admin-single-select-option {{ (string) $value === $selectedValue ? 'is-selected' : '' }}"
                    data-single-select-option
                    data-value="{{ $value }}"
                    data-label="{{ $text }}"
                    role="option"
                    aria-selected="{{ (string) $value === $selectedValue ? 'true' : 'false' }}">
                    <span class="admin-single-select-option-text">{{ $text }}</span>
                    <span class="admin-single-select-option-check" aria-hidden="true"></span>
                </button>
            @endforeach
        </div>

        <div class="admin-checkbox-multiselect-no-results" data-single-select-no-results hidden>No results found.</div>
        <div class="admin-checkbox-multiselect-empty" data-single-select-empty @if ($hasItems) hidden @endif>No options available.</div>
    </div>

    @error($name)
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
