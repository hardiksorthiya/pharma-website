@props(['limit' => null, 'showHeader' => true, 'variant' => 'page'])

@php
    $allServices = [
        [
            'icon' => 'contract-manufacturing',
            'title' => 'Contract Manufacturing & Private Label',
            'text' => 'Comprehensive contract manufacturing and private label solutions, including product development, custom formulations, branding, packaging, and market-specific labeling. Complete CDMO solutions under one roof.',
        ],
        [
            'icon' => 'regulatory-dossier',
            'title' => 'Regulatory & Dossier Support',
            'text' => 'Comprehensive regulatory support, including CTD/ACTD dossier preparation, product registration, regulatory documentation, and compliance assistance for international markets.',
        ],
        [
            'icon' => 'api-sourcing',
            'title' => 'API & Custom Sourcing',
            'text' => 'Reliable sourcing of APIs, pharmaceutical intermediates, finished formulations, oncology medicines, and specialty healthcare products through trusted manufacturing partners.',
        ],
        [
            'icon' => 'cold-chain',
            'title' => 'Cold Chain Pharmaceutical Logistics',
            'text' => 'Specialized storage, handling, and global distribution of temperature-sensitive pharmaceutical products through validated cold chain logistics, ensuring product integrity throughout the supply chain.',
        ],
        [
            'icon' => 'global-supply',
            'title' => 'Global Supply & Distribution',
            'text' => 'End-to-end export management, documentation, and reliable global distribution to pharmaceutical distributors, hospitals, healthcare institutions, and government organizations worldwide.',
        ],
    ];

    $services = $limit ? array_slice($allServices, 0, (int) $limit) : $allServices;

    $headerTitle = 'Complete Pharmaceutical Solutions';
    $headerAccent = 'Under One Roof';
    $headerIntro = 'We deliver integrated pharmaceutical solutions through trusted manufacturing partnerships, regulatory expertise, reliable sourcing, and efficient global supply chain management, supporting healthcare organizations worldwide.';
    $ctaUrl = url('/our-capabilities');
    $ctaLabel = 'Explore Our Capabilities';
@endphp

<section class="services-section services-section--{{ $variant }} {{ $variant === 'home' ? 'home-reveal home-parallax' : '' }}"
    @if ($variant === 'home') data-home-reveal data-home-parallax @endif>
    <div class="container">
        @if ($showHeader)
            <div class="row services-header align-items-end {{ $variant === 'home' ? 'home-reveal-item' : '' }}">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <span class="services-badge">
                        <span class="services-badge-dot"></span>
                        Our Services
                    </span>
                    <h2 class="services-title">
                        {{ $headerTitle }}
                        <span class="services-title-accent cursor-zoom">{{ $headerAccent }}</span>
                    </h2>
                </div>
                <div class="col-lg-5">
                    <p class="services-intro">
                        {{ $headerIntro }}
                    </p>
                    @if ($variant === 'home')
                        <a href="{{ $ctaUrl }}" class="services-cta cursor-zoom">
                            <span>{{ $ctaLabel }}</span>
                            <span class="services-cta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                                </svg>
                            </span>
                        </a>
                    @endif
                </div>
            </div>
        @endif

        <div class="row">
            @foreach ($services as $index => $service)
                <div class="col-md-6 col-lg-4 mb-4 {{ $variant === 'home' ? 'home-reveal-item' : '' }}">
                    <div class="service-card h-100">
                        <span class="service-card-icon" aria-hidden="true">
                            @include('components.frontend.services.icons.' . $service['icon'])
                        </span>
                        <span class="service-card-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>

                        <h3 class="service-card-title">{{ $service['title'] }}</h3>
                        <p class="service-card-text">{{ $service['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
