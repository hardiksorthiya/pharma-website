@props(['slide'])

@php
    $hasVideo = !empty($slide['background_video']);
    $hasImage = !empty($slide['background_image']);
@endphp

<div class="hero-slide">
    <section class="hero-section {{ $hasVideo ? 'hero-section--video' : '' }}"
        @if (!$hasVideo && $hasImage)
            style="background-image: linear-gradient(105deg, rgba(6, 28, 40, 0.92) 0%, rgba(6, 28, 40, 0.55) 45%, rgba(6, 28, 40, 0.35) 100%), url('{{ $slide['background_image'] }}');"
        @endif>

        @if ($hasVideo)
            <video class="hero-video" autoplay muted loop playsinline
                @if ($hasImage) poster="{{ $slide['background_image'] }}" @endif>
                <source src="{{ $slide['background_video'] }}" type="video/mp4">
            </video>
            <div class="hero-overlay"></div>
        @endif

        <div class="container hero-container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-content">
                        @if (!empty($slide['badge']))
                            <span class="hero-badge">
                                <span class="hero-badge-dot"></span>
                                {{ $slide['badge'] }}
                            </span>
                        @endif

                        <h1 class="hero-title cursor-zoom">{{ $slide['title'] }}</h1>

                        @if (!empty($slide['text']))
                            <p class="hero-text">{{ $slide['text'] }}</p>
                        @endif

                        @if (!empty($slide['button_text']))
                            <a href="{{ $slide['button_url'] ?? '#' }}" class="btn hero-cta">
                                <span>{{ $slide['button_text'] }}</span>
                                <span class="hero-cta-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </span>
                            </a>
                        @endif
                    </div>
                </div>

                @if (!empty($slide['card']))
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="hero-card">
                            <div class="hero-card-top">
                                @if (!empty($slide['card']['avatars']))
                                    <div class="hero-avatars">
                                        @foreach ($slide['card']['avatars'] as $avatar)
                                            <span class="hero-avatar" style="background-image: url('{{ $avatar }}');"></span>
                                        @endforeach
                                    </div>
                                @endif

                                @if (!empty($slide['card']['stat']))
                                    <div class="hero-stat">{{ $slide['card']['stat'] }}</div>
                                @endif
                            </div>

                            <div class="hero-card-divider"></div>

                            @if (!empty($slide['card']['title']))
                                <h3 class="hero-card-title">{{ $slide['card']['title'] }}</h3>
                            @endif

                            @if (!empty($slide['card']['text']))
                                <p class="hero-card-text">{{ $slide['card']['text'] }}</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
