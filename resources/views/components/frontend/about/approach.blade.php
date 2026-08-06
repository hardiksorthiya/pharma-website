<section class="about-approach-section">
    <div class="container">
        <div class="row align-items-center about-approach-row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="about-approach-badge">
                    <span class="about-approach-badge-dot"></span>
                    Our Expertise
                </span>

                <h2 class="about-approach-title">
                    Beyond product supply
                    <span class="about-approach-title-accent">to end-to-end solutions</span>
                </h2>

                <p class="about-approach-item-text">
                    Our expertise extends beyond product supply to include contract manufacturing,
                    private labeling, regulatory dossier support, and cold chain pharmaceutical
                    distribution (2°C–8°C).
                </p>

                <ul class="about-approach-features">
                    <li>
                        <span class="about-approach-check" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </span>
                        Contract Manufacturing
                    </li>
                    <li>
                        <span class="about-approach-check" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </span>
                        Private Labeling
                    </li>
                    <li>
                        <span class="about-approach-check" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </span>
                        Regulatory Dossier Support
                    </li>
                    <li>
                        <span class="about-approach-check" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </span>
                        Cold Chain Distribution (2°C–8°C)
                    </li>
                </ul>
            </div>

            <div class="col-lg-6">
                <img class="about-approach-img"
                    src="{{ asset('assets/images/sans4.webp') }}"
                    alt="Pharmaceutical cold chain logistics and distribution">
            </div>
        </div>

        @php
            $expertiseCards = [
                [
                    'title' => 'Contract Manufacturing',
                    'text' => 'Partner with certified facilities for reliable, scalable production.',
                    'image' => asset('assets/images/icons/icon1.png'),
                    'alt' => 'Contract manufacturing',
                ],
                [
                    'title' => 'Private Labeling',
                    'text' => 'Build your brand with customized pharmaceutical product labeling.',
                    'image' => asset('assets/images/icons/icon2.png'),
                    'alt' => 'Private labeling',
                ],
                [
                    'title' => 'Regulatory Support',
                    'text' => 'Comprehensive dossier preparation for international market access.',
                    'image' => asset('assets/images/icons/icon3.png'),
                    'alt' => 'Regulatory support',
                ],
                [
                    'title' => 'Cold Chain Logistics',
                    'text' => 'Temperature-controlled distribution at 2°C–8°C for sensitive medicines.',
                    'image' => asset('assets/images/icons/icon4.png'),
                    'alt' => 'Cold chain logistics',
                ],
            ];
        @endphp

        <div class="row about-expertise-cards">
            @foreach ($expertiseCards as $index => $card)
                <div class="col-md-6 col-lg-3 {{ $index < count($expertiseCards) - 1 ? 'mb-4 mb-lg-0' : '' }}">
                    <div class="about-expertise-card">
                        <img class="about-expertise-card-icon" src="{{ $card['image'] }}" alt="{{ $card['alt'] }}">
                        <h3 class="about-expertise-card-title">{{ $card['title'] }}</h3>
                        <p class="about-expertise-card-text">{{ $card['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
