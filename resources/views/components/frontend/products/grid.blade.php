<div class="products-items products-view-grid row" id="productsItems">
    @forelse ($products as $product)
        @php
            $searchText = strtolower(implode(' ', array_filter([
                $product->title,
                $product->cas_no,
                $product->end_use,
                $product->category?->title,
                $product->subCategory?->title,
            ])));
        @endphp
        <div class="col-lg-4 col-md-6 mb-4 products-item"
            data-product-item
            data-categories="{{ $product->product_category_id }}"
            data-sub-categories="{{ $product->product_sub_category_id }}"
            data-search="{{ $searchText }}">
            <article class="product-card h-100">
                <a href="{{ url('/products/'.$product->slug) }}" class="product-card-link">
                    <div class="product-card-image-wrap">
                        @if ($product->feature_image_url)
                            <img src="{{ $product->feature_image_url }}"
                                alt="{{ $product->title }}"
                                class="product-card-image {{ $product->usesDefaultFeatureImage() ? 'product-card-image--default' : '' }}">
                        @else
                            <div class="product-card-image product-card-image--placeholder" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5v4h-5V3.5A2.5 2.5 0 0 1 8 1zm0 1a1.5 1.5 0 0 0-1.5 1.5V7h3V3.5A1.5 1.5 0 0 0 8 2zM3 5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="product-card-body">
                        <h3 class="product-card-title">{{ $product->title }}</h3>

                        @if ($product->cas_no)
                            <p class="product-card-meta"><span>CAS No.</span> {{ $product->cas_no }}</p>
                        @endif

                        @if ($product->category || $product->subCategory)
                            <div class="product-card-tags">
                                @if ($product->category)
                                    <span class="product-card-tag">{{ $product->category->title }}</span>
                                @endif
                                @if ($product->subCategory)
                                    <span class="product-card-tag">{{ $product->subCategory->title }}</span>
                                @endif
                            </div>
                        @endif

                        @if ($product->end_use)
                            <p class="product-card-desc">{{ Str::limit($product->end_use, 110) }}</p>
                        @endif

                        <span class="product-card-cta">View Details</span>
                    </div>
                </a>
            </article>
        </div>
    @empty
        <div class="col-12">
            <div class="categories-empty">No products available yet.</div>
        </div>
    @endforelse
</div>
