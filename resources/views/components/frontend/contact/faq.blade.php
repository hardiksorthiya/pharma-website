@php
    $faqs = [
        [
            'question' => 'Do you provide customized pharmaceutical solutions?',
            'answer' => [
                'Yes. We specialize in providing customized pharmaceutical solutions based on specific customer and market requirements.',
                'Depending on feasibility and applicable regulatory requirements, we can support customized molecules, strengths, dosage forms, formulations, packaging configurations, private labeling, and other product-specific requirements.',
            ],
        ],
        [
            'question' => 'What if the product I need is not listed on your website?',
            'answer' => [
                'Our website represents only a selection of our available products and capabilities.',
                'If you cannot find the product you require, simply send us the product name, strength, dosage form, quantity, and destination country. Our team will evaluate your requirement and explore suitable sourcing, manufacturing, or supply options.',
            ],
            'link' => ['text' => 'Send Your Product Requirement →', 'url' => '#contactForm'],
        ],
        [
            'question' => 'Can you supply medicines directly to hospitals and healthcare institutions?',
            'answer' => 'Yes. Subject to applicable regulations and commercial requirements, we can work with hospitals, healthcare institutions, pharmaceutical distributors, importers, procurement organizations, and other authorized healthcare entities.',
        ],
        [
            'question' => 'Can you help source orphan drugs and rare disease medicines?',
            'answer' => [
                'Yes. We assist international customers with requirements for orphan drugs, specialty medicines, and medicines used for rare diseases, subject to product availability and applicable regulatory requirements.',
                'Send us the product details and destination country, and our team will evaluate suitable sourcing and supply options.',
            ],
            'link' => ['text' => 'Submit Orphan Drug Requirement →', 'url' => '#contactForm'],
        ],
        [
            'question' => 'Do you provide customized packaging and labeling?',
            'answer' => 'Yes. Depending on product, order quantity, and regulatory requirements, we can support customized packaging, private labeling, artwork, language requirements, and market-specific labeling.',
        ],
        [
            'question' => 'Can you handle temperature-sensitive pharmaceutical shipments?',
            'answer' => [
                'Yes. We specialize in 2°C–8°C cold-chain pharmaceutical supply for applicable temperature-sensitive products.',
                'Depending on shipment requirements, we can arrange suitable insulated packaging and temperature monitoring with data loggers to help maintain product integrity throughout transportation.',
            ],
        ],
        [
            'question' => 'How can I become a distributor or business partner?',
            'answer' => 'We welcome partnership opportunities with pharmaceutical importers, distributors, healthcare organizations, and other qualified partners across international markets. Share your company profile, country, areas of interest, and product requirements with our business development team to start a discussion.',
            'link' => ['text' => 'Discuss a Business Partnership →', 'url' => '#contactForm'],
        ],
    ];
@endphp

<section class="contact-faq-section">
    <div class="container">
        <div class="contact-faq-heading text-center">
            <span class="contact-faq-badge">
                <span class="contact-faq-badge-dot"></span>
                FAQ
            </span>
            <h2 class="contact-faq-title">
                Frequently Asked
                <span class="contact-faq-title-accent">Questions</span>
            </h2>
            <p class="contact-faq-intro">
                Find answers to common questions about our pharmaceutical products, global supply,
                customized solutions, regulatory support, cold-chain logistics, and business partnerships.
            </p>
        </div>

        <div class="contact-faq-accordion" id="contactFaqAccordion">
            @foreach ($faqs as $index => $faq)
                @php
                    $itemId = 'contactFaq' . ($index + 1);
                    $isFirst = $index === 0;
                    $answers = is_array($faq['answer']) ? $faq['answer'] : [$faq['answer']];
                @endphp
                <div class="contact-faq-item {{ $isFirst ? 'contact-faq-item--active' : '' }}">
                    <div class="contact-faq-item-header" id="{{ $itemId }}Heading">
                        <button
                            class="contact-faq-btn {{ $isFirst ? '' : 'collapsed' }}"
                            type="button"
                            data-toggle="collapse"
                            data-target="#{{ $itemId }}Collapse"
                            aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                            aria-controls="{{ $itemId }}Collapse">
                            <span class="contact-faq-question">{{ $faq['question'] }}</span>
                            <span class="contact-faq-icon" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div
                        id="{{ $itemId }}Collapse"
                        class="collapse {{ $isFirst ? 'show' : '' }}"
                        aria-labelledby="{{ $itemId }}Heading"
                        data-parent="#contactFaqAccordion">
                        <div class="contact-faq-body">
                            @foreach ($answers as $paragraph)
                                <p>{{ $paragraph }}</p>
                            @endforeach
                            @if (! empty($faq['link']))
                                <a href="{{ $faq['link']['url'] }}" class="contact-faq-link">{{ $faq['link']['text'] }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
    <script src="{{ asset('assets/js/frontend/contact-faq.js') }}"></script>
@endpush
