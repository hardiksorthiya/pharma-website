@props(['limit' => null, 'showHeader' => true, 'variant' => 'page'])

@php
    $allServices = [
        [
            'title' => 'Laboratory Testing',
            'text' => 'Advanced laboratory testing services delivering precise, reliable results for research and healthcare needs.',
        ],
        [
            'title' => 'Biomedical Testing',
            'text' => 'Specialized biomedical tests designed to provide accurate data for clinical and research applications.',
        ],
        [
            'title' => 'Quality Control & Validation',
            'text' => 'Comprehensive quality assurance and validation processes ensuring compliance and product integrity.',
        ],
        [
            'title' => 'Diagnostic Testing',
            'text' => 'Accurate diagnostic testing solutions supporting early detection, monitoring, and clinical decision-making.',
        ],
        [
            'title' => 'Industrial Testing',
            'text' => 'Robust industrial testing programs to verify material quality, safety, and regulatory compliance.',
        ],
        [
            'title' => 'Clinical Testing',
            'text' => 'Clinical testing services aligned with pharmaceutical standards for trials, validation, and patient safety.',
        ],
    ];

    $services = $limit ? array_slice($allServices, 0, (int) $limit) : $allServices;
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
                        Reliable testing, analysis &amp;
                        <span class="services-title-accent cursor-zoom">research solutions</span>
                    </h2>
                </div>
                <div class="col-lg-5">
                    <p class="services-intro">
                        Our laboratory provides reliable testing, precise analysis, and research support
                        backed by scientific expertise and modern technology.
                    </p>
                    @if ($limit)
                        <a href="{{ url('/services') }}" class="services-cta cursor-zoom">
                            <span>View All Services</span>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                            </svg>
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
