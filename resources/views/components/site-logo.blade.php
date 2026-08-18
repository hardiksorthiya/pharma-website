@props([
    'class' => 'header-logo',
    'iconClass' => 'header-logo-icon',
    'textClass' => 'header-logo-text',
    'iconSize' => 26,
    'useStickyVariant' => false,
])

<a href="{{ url('/') }}" class="{{ $class }}">
    @if ($useStickyVariant && $settings->logo_url && $settings->sticky_logo_url)
        <img
            src="{{ $settings->logo_url }}"
            alt="{{ config('app.name', 'Sanskriti Pharma') }}"
            class="{{ $class }}-img {{ $class }}-img--default">
        <img
            src="{{ $settings->sticky_logo_url }}"
            alt="{{ config('app.name', 'Sanskriti Pharma') }}"
            class="{{ $class }}-img {{ $class }}-img--sticky">
    @elseif ($settings->logo_url)
        <img src="{{ $settings->logo_url }}" alt="{{ config('app.name', 'Sanskriti Pharma') }}" class="{{ $class }}-img">
    @else
        <span class="{{ $iconClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="{{ $iconSize }}" height="{{ $iconSize }}" fill="currentColor" viewBox="0 0 16 16">
                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13z"/>
            </svg>
        </span>
        <span class="{{ $textClass }}">{{ config('app.name', 'Sanskriti Pharma') }}</span>
    @endif
</a>
