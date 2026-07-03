@php
    $pillars = [
        ['title' => 'Quality Assurance', 'text' => 'Validated processes and comprehensive QA systems at every production stage.'],
        ['title' => 'Regulatory Compliance', 'text' => 'WHO-GMP standards and international regulatory requirements met consistently.'],
        ['title' => 'Patient Safety', 'text' => 'Every product manufactured with uncompromising focus on safety and efficacy.'],
    ];

    $facilities = [
        [
            'number' => '01',
            'badge' => '2 Facilities',
            'title' => 'Finished Formulation Manufacturing',
            'text' => 'Our advanced formulation facilities manufacture a comprehensive range of pharmaceutical dosage forms. Every product is manufactured under stringent quality systems using advanced production technologies to ensure superior quality, safety, efficacy, and regulatory compliance.',
            'image' => 'https://images.unsplash.com/photo-1581093458791-9d15482442c6?auto=format&fit=crop&w=900&q=80',
            'capabilities_label' => 'Dosage Forms Manufactured',
            'capabilities' => [
                'Tablets', 'Capsules', 'Sterile Injectables', 'Lyophilized Injections',
                'Oral Liquids', 'Dry Syrups', 'Powders', 'Sachets', 'Topical Preparations',
                'Creams & Ointments', 'Ophthalmic Preparations', 'Soft Gel Capsules',
                'Specialized Formulations',
            ],
            'reverse' => false,
            'theme' => 'light',
        ],
        [
            'number' => '02',
            'badge' => 'High-Containment',
            'title' => 'Cytotoxic (Oncology) Manufacturing',
            'text' => 'Our dedicated high-containment oncology manufacturing facility is specifically designed for the production of high-potency cytotoxic medicines with advanced containment technologies, controlled environments, and stringent safety protocols.',
            'image' => 'https://images.unsplash.com/photo-1576678927484-cc907957088c?auto=format&fit=crop&w=900&q=80',
            'capabilities_label' => 'Manufacturing Capabilities',
            'capabilities' => [
                'Oncology Tablets', 'Oncology Capsules', 'Sterile Oncology Injectables',
                'Lyophilized Oncology Products', 'Hormonal & High-Potency Formulations',
                'Specialty Oncology Medicines',
            ],
            'reverse' => true,
            'theme' => 'dark',
        ],
        [
            'number' => '03',
            'badge' => 'CDMO Partner',
            'title' => 'API, Intermediates & CDMO Manufacturing',
            'text' => 'Our API manufacturing facility specializes in the development and commercial production of Active Pharmaceutical Ingredients (APIs), Advanced Pharmaceutical Intermediates, and Specialty Chemicals. As a trusted CDMO and Custom Synthesis Partner, we provide end-to-end manufacturing and development support.',
            'image' => 'https://images.unsplash.com/photo-1582719471384-894fbb16e074?auto=format&fit=crop&w=900&q=80',
            'capabilities_label' => 'Services & Capabilities',
            'therapeutic_areas' => [
                'Oncology', 'Anti-Infectives', 'Cardiovascular', 'Anti-Diabetic',
                'Central Nervous System', 'Gastroenterology', 'Pain Management',
                'Hormonal', 'Critical Care', 'Specialty Therapeutics',
            ],
            'capabilities' => [
                'Advanced Pharmaceutical Intermediates', 'Custom Synthesis',
                'Contract Development & Manufacturing (CDMO)', 'Process Research & Development',
                'Process Development & Optimization', 'Technology Transfer',
                'Scale-Up & Commercial Manufacturing', 'Analytical Method Development',
                'Impurity Synthesis', 'Reference Standards',
                'Regulatory Documentation & Technical Support',
            ],
            'reverse' => false,
            'theme' => 'light',
        ],
        [
            'number' => '04',
            'badge' => 'CDSCO Compliant',
            'title' => 'Class C & D Medical Device Manufacturing',
            'text' => 'Our CDSCO-compliant facility is dedicated to manufacturing high-risk medical devices in accordance with India\'s Medical Devices Rules and internationally recognized quality standards. Equipped with advanced technologies, controlled environments, and robust quality management systems.',
            'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15f5a9519?auto=format&fit=crop&w=900&q=80',
            'capabilities_label' => 'Manufacturing Capabilities',
            'capabilities' => [
                'Class C & D Medical Devices', 'Orthopedic Implants', 'Bone Cement',
                'Surgical Consumables', 'Critical Care Medical Devices',
                'Customized OEM & Private Label Manufacturing',
                'Regulatory Documentation & Technical Support',
            ],
            'note' => 'Every medical device is manufactured under stringent quality control and validated production processes. For every sterile device, we maintain complete sterility validation and sterilization documentation — ensuring full traceability, regulatory compliance, and the highest standards of patient safety.',
            'reverse' => true,
            'theme' => 'accent',
        ],
    ];
@endphp

{{-- Intro --}}
<section class="mfg-intro">
    <div class="container">
        <div class="mfg-intro-header text-center">
            <span class="about-badge">
                <span class="about-badge-dot"></span>
                Manufacturing Excellence
            </span>
            <h2 class="mfg-intro-title">
                Precision manufacturing.
                <span class="about-title-gradient">Global quality.</span>
            </h2>
            <p class="mfg-intro-lead">
                At Sanskriti Pharma, manufacturing excellence is the cornerstone of our commitment to delivering
                safe, effective, and high-quality pharmaceutical products. Our state-of-the-art facilities are
                equipped with advanced technologies, automated production systems, and robust quality management
                processes to ensure every product meets the highest international standards.
            </p>
        </div>

        <div class="row mfg-intro-grid">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="mfg-intro-visual">
                    <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&w=900&q=80"
                        alt="Pharmaceutical manufacturing facility">
                    <div class="mfg-intro-visual-badge">
                        <span class="mfg-intro-visual-badge-value">WHO-GMP</span>
                        <span class="mfg-intro-visual-badge-label">Certified Facilities</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="mfg-intro-text">
                    With expertise spanning Active Pharmaceutical Ingredients (APIs), Advanced Pharmaceutical
                    Intermediates, oncology medicines, specialty pharmaceuticals, critical care products, generic
                    medicines, and advanced pharmaceutical formulations, our manufacturing capabilities are designed
                    to meet the evolving needs of global healthcare markets.
                </p>
                <p class="mfg-intro-text mb-4">
                    Every stage of production is supported by experienced professionals, advanced analytical
                    laboratories, validated manufacturing processes, and comprehensive quality assurance systems.
                </p>
                <ul class="mfg-expertise-tags">
                    <li>APIs</li>
                    <li>Oncology</li>
                    <li>Specialty Pharma</li>
                    <li>Critical Care</li>
                    <li>Generics</li>
                    <li>Formulations</li>
                </ul>
            </div>
        </div>

        <div class="row mfg-pillars">
            @foreach ($pillars as $pillar)
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="mfg-pillar-card">
                        <span class="mfg-pillar-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </span>
                        <h3 class="mfg-pillar-title">{{ $pillar['title'] }}</h3>
                        <p class="mfg-pillar-text">{{ $pillar['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Infrastructure band --}}
<section class="mfg-infra-band">
    <div class="container">
        <div class="mfg-infra-band-header text-center">
            <h2 class="mfg-infra-band-title">Our Manufacturing Infrastructure</h2>
            <p class="mfg-infra-band-desc">Four specialized facilities delivering end-to-end pharmaceutical and medical device manufacturing.</p>
        </div>
        <div class="row">
            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                <div class="mfg-infra-stat">
                    <span class="mfg-infra-stat-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </span>
                    <span class="mfg-infra-stat-value">2</span>
                    <span class="mfg-infra-stat-label">Formulation Facilities</span>
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                <div class="mfg-infra-stat">
                    <span class="mfg-infra-stat-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                    </span>
                    <span class="mfg-infra-stat-value">1</span>
                    <span class="mfg-infra-stat-label">Oncology Facility</span>
                </div>
            </div>
            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                <div class="mfg-infra-stat">
                    <span class="mfg-infra-stat-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M7.5 1.018a7 7 0 0 0-4.79 11.566L7.5 7.793V1.018zm1 0V7.5h6.482A7.001 7.001 0 0 0 8.5 1.018zM14.982 8.5H8.207l-4.79 4.79A7 7 0 0 0 14.982 8.5zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                        </svg>
                    </span>
                    <span class="mfg-infra-stat-value">1</span>
                    <span class="mfg-infra-stat-label">API &amp; CDMO Facility</span>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="mfg-infra-stat">
                    <span class="mfg-infra-stat-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 1a5 5 0 0 0-5 5v1h1a4 4 0 0 1 4-4 4 4 0 0 1 4 4h1V6a5 5 0 0 0-5-5z"/>
                            <path d="M3 8a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2.5a3.5 3.5 0 0 1-3.5 3.5h-3A3.5 3.5 0 0 1 3 10.5V8z"/>
                        </svg>
                    </span>
                    <span class="mfg-infra-stat-value">1</span>
                    <span class="mfg-infra-stat-label">Medical Device Facility</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Facility blocks --}}
<section class="mfg-facilities">
    <div class="container">
        @foreach ($facilities as $facility)
            <article class="mfg-block mfg-block--{{ $facility['theme'] }} {{ $facility['reverse'] ? 'mfg-block--reverse' : '' }}">
                <div class="row align-items-center g-0">
                    <div class="col-lg-5 {{ $facility['reverse'] ? 'order-lg-2' : '' }}">
                        <div class="mfg-block-media">
                            <img src="{{ $facility['image'] }}" alt="{{ $facility['title'] }}">
                            <span class="mfg-block-number">{{ $facility['number'] }}</span>
                        </div>
                    </div>
                    <div class="col-lg-7 {{ $facility['reverse'] ? 'order-lg-1' : '' }}">
                        <div class="mfg-block-body">
                            <span class="mfg-block-badge">{{ $facility['badge'] }}</span>
                            <h3 class="mfg-block-title">{{ $facility['title'] }}</h3>
                            <p class="mfg-block-text">{{ $facility['text'] }}</p>

                            @if (! empty($facility['therapeutic_areas']))
                                <div class="mfg-block-therapeutic">
                                    <p class="mfg-block-cap-label">API Manufacturing — Therapeutic Areas</p>
                                    <ul class="mfg-block-tags">
                                        @foreach ($facility['therapeutic_areas'] as $area)
                                            <li>{{ $area }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <p class="mfg-block-cap-label">{{ $facility['capabilities_label'] }}</p>
                            <ul class="mfg-block-caps">
                                @foreach ($facility['capabilities'] as $cap)
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                        {{ $cap }}
                                    </li>
                                @endforeach
                            </ul>

                            @if (! empty($facility['note']))
                                <div class="mfg-block-callout">
                                    <p class="mb-0">{{ $facility['note'] }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>

{{-- Commitment --}}
<section class="mfg-commitment">
    <div class="container">
        <div class="mfg-commitment-inner">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <span class="mfg-commitment-eyebrow">Our Promise</span>
                    <h2 class="mfg-commitment-title">Our Commitment to Manufacturing Excellence</h2>
                    <p class="mfg-commitment-text mb-0">
                        Manufacturing is more than production—it is our commitment to quality, innovation, and patient
                        safety. By continuously investing in advanced technologies, modern infrastructure, scientific
                        expertise, and operational excellence, Sanskriti Pharma delivers pharmaceutical products that
                        meet the highest global standards and earn the trust of pharmaceutical companies, healthcare
                        institutions, and patients worldwide.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ url('/contact-us') }}" class="btn about-cta">
                        <span>Partner With Us</span>
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
