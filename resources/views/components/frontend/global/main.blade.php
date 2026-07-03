@php
    $regions = [
        [
            'id' => 'africa',
            'name' => 'Africa',
            'icon' => 'africa',
            'countries' => ['Uganda', 'Somalia', 'Kenya', 'Rwanda', 'Botswana', 'Ghana', 'Liberia', 'Morocco', 'Cameroon', 'Côte d\'Ivoire', 'Nigeria', 'Mauritius', 'Burkina Faso'],
            'codes' => ['UG', 'SO', 'KE', 'RW', 'BW', 'GH', 'LR', 'MA', 'CM', 'CI', 'NG', 'MU', 'BF'],
        ],
        [
            'id' => 'asia-pacific',
            'name' => 'Asia Pacific',
            'icon' => 'asia',
            'countries' => ['Philippines', 'Afghanistan'],
            'codes' => ['PH', 'AF'],
        ],
        [
            'id' => 'middle-east',
            'name' => 'Middle East',
            'icon' => 'middle-east',
            'countries' => ['Saudi Arabia', 'Qatar', 'United Arab Emirates (UAE)'],
            'codes' => ['SA', 'QA', 'AE'],
        ],
        [
            'id' => 'cis',
            'name' => 'CIS Region',
            'icon' => 'cis',
            'countries' => ['Uzbekistan', 'Kazakhstan'],
            'codes' => ['UZ', 'KZ'],
        ],
        [
            'id' => 'europe',
            'name' => 'Europe',
            'icon' => 'europe',
            'countries' => ['Lithuania', 'Serbia', 'Romania'],
            'codes' => ['LT', 'RS', 'RO'],
        ],
        [
            'id' => 'latin-america',
            'name' => 'Latin America',
            'icon' => 'latin-america',
            'countries' => ['Brazil', 'Mexico', 'Colombia', 'Honduras', 'Haiti', 'Venezuela', 'El Salvador', 'Uruguay'],
            'codes' => ['BR', 'MX', 'CO', 'HN', 'HT', 'VE', 'SV', 'UY'],
        ],
        [
            'id' => 'caribbean',
            'name' => 'Caribbean',
            'icon' => 'caribbean',
            'countries' => ['Jamaica', 'Saint Lucia', 'Barbados'],
            'codes' => ['JM', 'LC', 'BB'],
        ],
        [
            'id' => 'oceania',
            'name' => 'Oceania',
            'icon' => 'oceania',
            'countries' => ['Fiji'],
            'codes' => ['FJ'],
        ],
    ];

    $mapCountryCodes = collect($regions)->flatMap(fn ($r) => $r['codes'])->unique()->values()->all();
    $totalCountries = collect($regions)->sum(fn ($r) => count($r['countries']));
@endphp

<section class="gp-intro">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <span class="about-badge">
                    <span class="about-badge-dot"></span>
                    Care Beyond Borders
                </span>
                <h2 class="about-title">
                    Trusted pharmaceutical exporter serving
                    <span class="about-title-gradient">global healthcare markets</span>
                </h2>
                <p class="about-text about-text--wide">
                    At Sanskruti Pharma, we are committed to expanding access to quality healthcare by delivering
                    high-quality pharmaceutical products, oncology medicines, APIs, hospital consumables, and medical
                    devices to healthcare providers across the world. Guided by our motto, “Care Beyond Borders,” we
                    combine international quality standards, regulatory expertise, and dependable supply to support
                    better patient outcomes worldwide.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row gp-stats">
                    <div class="col-6 mb-4">
                        <div class="gp-stat-card">
                            <span class="gp-stat-value">35+</span>
                            <span class="gp-stat-label">Countries Served</span>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="gp-stat-card">
                            <span class="gp-stat-value">100+</span>
                            <span class="gp-stat-label">Registered Products</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="gp-stat-card">
                            <span class="gp-stat-value">8</span>
                            <span class="gp-stat-label">Global Regions</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="gp-stat-card">
                            <span class="gp-stat-value">WHO</span>
                            <span class="gp-stat-label">GMP Certified</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gp-narrative">
    <div class="container">
        <div class="gp-narrative-grid">
            <p class="gp-narrative-text">
                As a leading pharmaceutical exporter company from India, we have established long-term partnerships
                with distributors, hospitals, healthcare institutions, government organizations, importers, and
                pharmaceutical companies across 35+ countries. Our expanding international presence reflects our
                commitment to quality, compliance, innovation, and customer satisfaction.
            </p>
            <p class="gp-narrative-text">
                With experience across Asia Pacific, Africa, Europe, Latin America, the Middle East, the CIS region,
                the Caribbean, and Oceania, we understand the regulatory requirements, market dynamics, and healthcare
                needs of diverse international markets. Our dedicated regulatory and export teams provide end-to-end
                support, including product registration, dossier preparation, documentation, customized packaging, and
                reliable global distribution.
            </p>
            <p class="gp-narrative-text mb-0">
                Sanskruti Pharma has 100+ oncology and finished formulation products already registered or currently
                undergoing registration across multiple international markets. Our strong regulatory capabilities and
                market-specific expertise enable partners to accelerate product registration, expand into new markets,
                and ensure continuous access to safe, effective, and affordable healthcare solutions.
            </p>
        </div>
    </div>
</section>

<section class="gp-map-section">
    <div class="container">
        <div class="gp-map-header text-center">
            <span class="about-approach-badge">
                <span class="about-approach-badge-dot"></span>
                Worldwide Reach
            </span>
            <h2 class="gp-map-title">Countries We Serve</h2>
            <p class="gp-map-desc">
                Our pharmaceutical products and healthcare solutions are trusted by partners across
                <strong>{{ $totalCountries }} countries</strong> worldwide. Highlighted regions on the map show our active markets.
            </p>
        </div>

        <div class="gp-map-wrap">
            <div id="global-presence-map" class="gp-map-canvas" aria-label="Interactive world map showing countries we serve"></div>
            <div id="gp-country-tooltip" class="gp-country-tooltip" role="tooltip" aria-hidden="true"></div>
            <div class="gp-map-legend">
                <span class="gp-map-legend-item">
                    <span class="gp-map-legend-dot gp-map-legend-dot--active"></span>
                    Countries we serve
                </span>
                <span class="gp-map-legend-item">
                    <span class="gp-map-legend-dot gp-map-legend-dot--hq"></span>
                    India (Headquarters)
                </span>
            </div>
        </div>

        <script type="application/json" id="global-map-data">
            {!! json_encode(['countries' => $mapCountryCodes, 'regions' => $regions]) !!}
        </script>
    </div>
</section>

<section class="gp-regions">
    <div class="container">
        <div class="gp-regions-header text-center">
            <h2 class="gp-regions-title">Explore by Region</h2>
            <p class="gp-regions-desc">Click a region to highlight its countries on the map above.</p>
        </div>

        <div class="row">
            @foreach ($regions as $region)
                <div class="col-md-6 col-lg-4 mb-4">
                    <article class="gp-region-card" data-region="{{ $region['id'] }}" data-codes="{{ implode(',', $region['codes']) }}">
                        <div class="gp-region-card-head">
                            <span class="gp-region-icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                            </span>
                            <h3 class="gp-region-name">{{ $region['name'] }}</h3>
                            <span class="gp-region-count">{{ count($region['countries']) }} {{ Str::plural('country', count($region['countries'])) }}</span>
                        </div>
                        <ul class="gp-country-list">
                            @foreach ($region['countries'] as $country)
                                <li>{{ $country }}</li>
                            @endforeach
                        </ul>
                    </article>
                </div>
            @endforeach
        </div>

        <p class="gp-expansion-note text-center">
            We are continuously expanding our presence into new international markets through strategic partnerships,
            product registrations, and regulatory approvals across the globe.
        </p>
    </div>
</section>

<section class="gp-partners">
    <div class="container">
        <div class="about-clients-block">
            <h3 class="about-clients-title">Who We Partner With</h3>
            <ul class="about-clients-list">
                <li><span class="about-clients-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg></span> Pharmaceutical Importers</li>
                <li><span class="about-clients-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/><path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zM8 1a2 2 0 1 1 .001 3.999A2 2 0 0 1 8 1z"/><path d="M2.5 4A1.5 1.5 0 0 0 1 5.5v.268A2.5 2.5 0 0 0 0 8v5.5A1.5 1.5 0 0 0 1.5 15h13a1.5 1.5 0 0 0 1.5-1.5V8a2.5 2.5 0 0 0-1-2V5.5A1.5 1.5 0 0 0 13.5 4h-11z"/></svg></span> Hospitals</li>
                <li><span class="about-clients-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/></svg></span> Distributors</li>
                <li><span class="about-clients-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/></svg></span> Government Organizations</li>
                <li><span class="about-clients-icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/></svg></span> Pharmaceutical Companies</li>
            </ul>
        </div>
    </div>
</section>

<section class="mfg-commitment">
    <div class="container">
        <div class="mfg-commitment-inner">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <span class="mfg-commitment-eyebrow">Partner With Us</span>
                    <h2 class="mfg-commitment-title">Expand Your Global Healthcare Reach</h2>
                    <p class="mfg-commitment-text mb-0">
                        Connect with our export and regulatory teams to explore product registration, market entry,
                        and reliable pharmaceutical supply across international markets.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ url('/contact-us') }}" class="btn about-cta">
                        <span>Contact Our Export Team</span>
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
