@props(['slides' => []])

@php
    $slideCount = count($slides);
@endphp

@if ($slideCount > 0)
    <div class="hero-slider-wrap">
        @if ($slideCount > 1)
            <div class="hero-slider" id="heroSlider" data-slide-count="{{ $slideCount }}">
                @foreach ($slides as $slide)
                    @include('components.frontend.home.hero-slide', ['slide' => $slide])
                @endforeach
            </div>

            @push('styles')
                <link rel="stylesheet" href="{{ asset('assets/css/slick/slick.css') }}">
                <link rel="stylesheet" href="{{ asset('assets/css/slick/slick-theme.css') }}">
            @endpush

            @push('scripts')
                <script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
                <script src="{{ asset('assets/js/frontend/hero-slider.js') }}"></script>
            @endpush
        @else
            @include('components.frontend.home.hero-slide', ['slide' => $slides[0]])
        @endif
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/frontend/hero-video.js') }}"></script>
    @endpush
@endif
