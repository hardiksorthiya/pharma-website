@php
    $capabilities = [
        [
            'id' => 'cdmo',
            'icon' => 'cdmo',
            'badge' => 'CDMO',
            'title' => 'Contract Development & Manufacturing (CDMO)',
            'text' => 'Transform your ideas into market-ready pharmaceutical products with our end-to-end manufacturing solutions.',
            'label' => 'Our Services Include',
            'items' => [
                'Contract Manufacturing', 'Custom Product Development', 'Private Label Manufacturing',
                'Technology Transfer', 'Product Portfolio Development', 'Commercial Scale Manufacturing',
            ],
            'theme' => 'light',
        ],
        [
            'id' => 'manufacturing',
            'icon' => 'manufacturing',
            'badge' => 'Manufacturing',
            'title' => 'Manufacturing Excellence',
            'text' => 'Manufacturing high-quality pharmaceutical products through internationally compliant facilities.',
            'label' => 'Dosage Forms',
            'items' => [
                'Tablets', 'Capsules', 'Oral Liquids', 'Dry Syrups', 'Injectables',
                'Dry Powder Injectables', 'Lyophilized Injections', 'Eye & Ear Drops', 'Nasal Sprays',
                'Ointments & Creams', 'Sachets', 'Soft Gel Capsules', 'Suppositories',
            ],
            'theme' => 'dark',
        ],
        [
            'id' => 'api',
            'icon' => 'api',
            'badge' => 'API',
            'title' => 'API & Advanced Intermediates',
            'text' => 'Reliable manufacturing and sourcing solutions for pharmaceutical ingredients that meet global quality standards.',
            'label' => 'Capabilities',
            'items' => [
                'Active Pharmaceutical Ingredients (APIs)', 'Oncology APIs',
                'Advanced Pharmaceutical Intermediates', 'Custom API Manufacturing',
                'API Sourcing & Global Supply',
            ],
            'theme' => 'light',
        ],
        [
            'id' => 'oncology',
            'icon' => 'oncology',
            'badge' => 'Oncology',
            'title' => 'Oncology Expertise',
            'text' => 'Delivering specialized oncology solutions through dedicated cytotoxic manufacturing facilities.',
            'label' => 'Our Expertise',
            'items' => [
                'Oncology Injectables', 'Oral Oncology Medicines', 'Hormonal Therapies',
                'Targeted Therapies', 'Supportive Care Medicines',
            ],
            'theme' => 'accent',
        ],
        [
            'id' => 'medical-devices',
            'icon' => 'devices',
            'badge' => 'Medical Devices',
            'title' => 'Medical Devices',
            'text' => 'Comprehensive manufacturing and supply of high-quality medical devices.',
            'label' => 'Capabilities',
            'items' => [
                'CDSCO Compliant Class C & D Manufacturing Facility', 'Orthopaedic Implants', 'Bone Cement',
                'Diagnostic Kits', 'Critical Care Medical Devices',
                'Sterility Report Maintained for Every Medical Device Manufactured',
            ],
            'theme' => 'light',
        ],
        [
            'id' => 'regulatory',
            'icon' => 'regulatory',
            'badge' => 'Regulatory',
            'title' => 'Regulatory & Packaging Compliance',
            'text' => 'Bringing a pharmaceutical product to market requires more than regulatory documentation. Every country has unique requirements for packaging design, labeling, artwork, language, and compliance. Our experienced Regulatory & Artwork Team develops market-specific packaging and technical documentation that aligns with local regulatory requirements, helping reduce approval timelines and ensure smoother product registrations.',
            'label' => 'Our Expertise',
            'items' => [
                'CTD & ACTD Dossiers', 'Product Registration Support', 'Market-Specific Packaging Design',
                'Regulatory Artwork Development', 'Label & Carton Compliance', 'Multi-Language Packaging',
                'Country-Specific Documentation',
            ],
            'theme' => 'dark',
        ],
        [
            'id' => 'export',
            'icon' => 'export',
            'badge' => 'Global Export',
            'title' => 'Global Export Solutions',
            'text' => 'Reliable pharmaceutical exports backed by efficient supply chain management and international compliance.',
            'label' => 'Services',
            'items' => [
                'Export to 35+ Countries', 'International Documentation', 'Customs & Export Compliance',
                'Air & Sea Freight Coordination', 'Temperature-Controlled Shipments',
                'End-to-End Supply Chain Management',
            ],
            'theme' => 'light',
        ],
        [
            'id' => 'cold-chain',
            'icon' => 'cold-chain',
            'badge' => 'Cold Chain',
            'title' => 'Cold Chain Pharmaceutical Expertise',
            'text' => 'Specialized handling of temperature-sensitive pharmaceutical products from manufacturing to final delivery.',
            'label' => 'Capabilities',
            'items' => [
                'Validated 2°C–8°C Cold Chain Solutions', 'Temperature Monitoring & Data Logging',
                'Qualified Cold Chain Packaging', 'Worldwide Cold Chain Distribution',
            ],
            'theme' => 'accent',
        ],
        [
            'id' => 'quality',
            'icon' => 'quality',
            'badge' => 'Quality',
            'title' => 'Quality Assurance',
            'text' => 'Quality is at the heart of everything we do. Every product is manufactured under strict quality systems with comprehensive testing, documentation, and batch traceability to ensure consistent compliance with international standards.',
            'label' => 'Quality Commitment',
            'items' => [
                'WHO-GMP Compliant Manufacturing', 'Stringent Quality Control', 'Batch Traceability',
                'Complete Documentation', 'Certificate of Analysis (COA)', 'Stability Data Support',
                'Vendor Qualification', 'Audit Support',
            ],
            'theme' => 'light',
        ],
    ];

    $whyChoose = [
        'Complete Pharmaceutical Solutions Under One Roof',
        'Contract Development & Manufacturing (CDMO)',
        'API & Advanced Intermediates',
        'Oncology & Specialty Medicines',
        'Medical Devices Manufacturing',
        'Regulatory & Packaging Expertise',
        'Cold Chain Pharmaceutical Solutions',
        'Private Label Manufacturing',
        'Global Export to 35+ Countries',
        'Dedicated Support from Development to Delivery',
    ];
@endphp

<section class="cap-intro">
    <div class="container">
        <div class="cap-intro-inner text-center">
            <span class="about-badge">
                <span class="about-badge-dot"></span>
                From Molecule to Market
            </span>
            <h2 class="cap-intro-title">
                Complete pharmaceutical solutions
                <span class="about-title-gradient">under one roof</span>
            </h2>
            <p class="cap-intro-lead">
                At Sanskriti Pharma, we are more than a pharmaceutical exporter—we are your strategic partner for
                developing, manufacturing, registering, and delivering high-quality healthcare products to global markets.
            </p>
            <p class="cap-intro-text mb-0">
                From APIs and Advanced Intermediates to Finished Formulations, Medical Devices, Regulatory Support,
                Market-Specific Packaging, and Global Distribution, we provide integrated pharmaceutical solutions designed
                to help our partners accelerate market entry, ensure regulatory compliance, and achieve long-term business success.
            </p>
        </div>

        <div class="cap-overview">
            <div class="row">
                @foreach ($capabilities as $cap)
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <a href="#{{ $cap['id'] }}" class="cap-overview-card">
                            <span class="cap-overview-icon cap-overview-icon--{{ $cap['icon'] }}" aria-hidden="true">
                                @include('components.frontend.capabilities.icons.' . $cap['icon'])
                            </span>
                            <span class="cap-overview-label">{{ $cap['badge'] }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="cap-blocks">
    <div class="container">
        @foreach ($capabilities as $index => $cap)
            <article id="{{ $cap['id'] }}" class="cap-block cap-block--{{ $cap['theme'] }}">
                <div class="row align-items-start">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <span class="cap-block-icon cap-block-icon--{{ $cap['icon'] }}" aria-hidden="true">
                            @include('components.frontend.capabilities.icons.' . $cap['icon'])
                        </span>
                        <span class="cap-block-badge">{{ $cap['badge'] }}</span>
                        <h3 class="cap-block-title">{{ $cap['title'] }}</h3>
                        <p class="cap-block-text">{{ $cap['text'] }}</p>
                    </div>
                    <div class="col-lg-8">
                        <p class="cap-block-label">{{ $cap['label'] }}</p>
                        <ul class="cap-block-list">
                            @foreach ($cap['items'] as $item)
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                    {{ $item }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>

<section class="cap-partner">
    <div class="container">
        <div class="cap-partner-card">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <span class="mfg-commitment-eyebrow">One-Stop Partner</span>
                    <h2 class="cap-partner-title">One-Stop Pharmaceutical Partner</h2>
                    <p class="cap-partner-text mb-0">
                        Whether you need API manufacturing, finished formulations, medical devices, regulatory support,
                        market-specific packaging, private labeling, or global distribution, Sanskriti Pharma delivers
                        everything under one trusted partner. We simplify pharmaceutical sourcing so you can focus on
                        growing your business while we manage the complexity behind the scenes.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ url('/contact-us') }}" class="btn about-cta">
                        <span>Become a Partner</span>
                        <span class="about-cta-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cap-why">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <h2 class="cap-why-title">Why Global Partners Choose Sanskriti Pharma</h2>
                <p class="cap-why-desc">
                    Integrated capabilities, regulatory expertise, and dependable global supply — everything you need
                    to succeed in international pharmaceutical markets.
                </p>
            </div>
            <div class="col-lg-7">
                <ul class="cap-why-list">
                    @foreach ($whyChoose as $point)
                        <li>
                            <span class="cap-why-check" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </span>
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
