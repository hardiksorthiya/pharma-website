@php
    $detailSections = collect([
        ['label' => 'End Use', 'type' => 'text', 'value' => $product->end_use],
        ['label' => 'Available Strengths', 'type' => 'text', 'value' => $product->available_strengths],
        ['label' => 'Packing', 'type' => 'text', 'value' => $product->packing],
        ['label' => 'Dosage Types', 'type' => 'chips', 'items' => $product->dosageTypes],
        ['label' => 'Therapeutic Classes', 'type' => 'chips', 'items' => $product->therapeuticClasses],
        ['label' => 'Specifications', 'type' => 'chips', 'items' => $product->specifications],
    ])->filter(function ($section) {
        if ($section['type'] === 'text') {
            return filled($section['value']);
        }

        return $section['items']->isNotEmpty();
    });
@endphp

<section class="product-detail-section">
    <div class="container">
        <a href="{{ url('/products') }}" class="product-detail-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            Back to Products
        </a>

        <div class="product-detail-card">
            <div class="row no-gutters product-detail-row">
                <div class="col-lg-5 product-detail-media-col">
                    <div class="product-detail-image-wrap">
                        @if ($product->feature_image_url)
                            <img src="{{ $product->feature_image_url }}"
                                alt="{{ $product->title }}"
                                class="product-detail-image {{ $product->usesDefaultFeatureImage() ? 'product-detail-image--default' : '' }}">
                        @else
                            <div class="product-detail-image product-detail-image--placeholder" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5v4h-5V3.5A2.5 2.5 0 0 1 8 1zm0 1a1.5 1.5 0 0 0-1.5 1.5V7h3V3.5A1.5 1.5 0 0 0 8 2zM3 5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-7 product-detail-content-col">
                    <div class="product-detail-content">
                        <div class="product-detail-header">
                            @if ($product->category || $product->subCategory)
                                <div class="product-detail-tags">
                                    @if ($product->category)
                                        <span class="product-detail-tag">{{ $product->category->title }}</span>
                                    @endif
                                    @if ($product->subCategory)
                                        <span class="product-detail-tag">{{ $product->subCategory->title }}</span>
                                    @endif
                                </div>
                            @endif

                            <h1 class="product-detail-title">{{ $product->title }}</h1>

                            @if ($product->cas_no)
                                <div class="product-detail-cas">
                                    <span class="product-detail-cas-label">CAS No.</span>
                                    <span class="product-detail-cas-value">{{ $product->cas_no }}</span>
                                </div>
                            @endif
                        </div>

                        @if ($detailSections->isNotEmpty())
                            <div class="product-detail-specs">
                                @foreach ($detailSections as $section)
                                    <div class="product-detail-spec {{ $section['type'] === 'text' ? 'product-detail-spec--full' : '' }}">
                                        <div class="product-detail-spec-label">{{ $section['label'] }}</div>
                                        <div class="product-detail-spec-value">
                                            @if ($section['type'] === 'text')
                                                <p class="product-detail-spec-text">{{ $section['value'] }}</p>
                                            @else
                                                <div class="product-detail-chip-list">
                                                    @foreach ($section['items'] as $item)
                                                        <span class="product-detail-chip">{{ $item->name }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="product-detail-actions">
                            <button type="button"
                                class="btn contact-submit product-detail-enquire-btn"
                                data-toggle="modal"
                                data-target="#productEnquiryModal">
                                <span>Enquire Now</span>
                                <span class="contact-submit-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-4.178-6.995-6.998-4.178a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM14.207 1.524 2.257 8.5l4.178 2.495 3.09-5.18 1.043 1.043-1.043 1.74 1.74 1.043-5.18 3.09 2.495 4.178 6.425-11.588Z"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components.frontend.products.enquiry-modal', ['product' => $product])
