@props(['class' => 'header-logo', 'iconClass' => 'header-logo-icon', 'textClass' => 'header-logo-text', 'iconSize' => 22])

<a href="{{ url('/') }}" class="{{ $class }}">
    @if ($settings->logo_url)
        <img src="{{ $settings->logo_url }}" alt="{{ config('app.name', 'Sanskruti Pharma') }}" class="{{ $class }}-img">
    @else
        <span class="{{ $iconClass }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="{{ $iconSize }}" height="{{ $iconSize }}" fill="currentColor" viewBox="0 0 16 16">
                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13z"/>
            </svg>
        </span>
        <span class="{{ $textClass }}">{{ config('app.name', 'Sanskruti Pharma') }}</span>
    @endif
</a>
