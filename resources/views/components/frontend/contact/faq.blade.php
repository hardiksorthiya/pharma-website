@php
    $faqs = [
        [
            'question' => 'How can I request a quote for laboratory testing?',
            'answer' => 'Fill out the contact form on this page or email us at info@sanskrutipharma.com with your project details. Our team will review your requirements and respond with a tailored quote within 24–48 business hours.',
        ],
        [
            'question' => 'What certifications does your laboratory hold?',
            'answer' => 'Our facilities follow ISO-certified quality management systems and validated testing protocols. We maintain strict compliance with national and international pharmaceutical and laboratory standards.',
        ],
        [
            'question' => 'How long does it take to receive test results?',
            'answer' => 'Turnaround times vary by test type. Routine analyses are typically completed within 3–5 business days. Complex or specialized studies may require additional time, which we communicate upfront.',
        ],
        [
            'question' => 'Do you accept international sample submissions?',
            'answer' => 'Yes. We work with partners worldwide and can guide you through proper sample collection, packaging, and shipping requirements to ensure integrity upon arrival.',
        ],
        [
            'question' => 'How do I schedule a consultation with your team?',
            'answer' => 'Use the contact form and select your subject, or call us during business hours. A specialist will arrange a consultation to discuss your research or testing needs.',
        ],
        [
            'question' => 'What payment methods do you accept?',
            'answer' => 'We accept bank transfers, corporate purchase orders, and other standard B2B payment arrangements. Payment terms are outlined in your project agreement or invoice.',
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
                Frequently asked
                <span class="contact-faq-title-accent">questions</span>
            </h2>
            <p class="contact-faq-intro">
                Quick answers to common questions about our services, testing process,
                and how to get started with {{ config('app.name', 'Sanskruti Pharma') }}.
            </p>
        </div>

        <div class="contact-faq-accordion" id="contactFaqAccordion">
            @foreach ($faqs as $index => $faq)
                @php
                    $itemId = 'contactFaq' . ($index + 1);
                    $isFirst = $index === 0;
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
                            <p>{{ $faq['answer'] }}</p>
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
