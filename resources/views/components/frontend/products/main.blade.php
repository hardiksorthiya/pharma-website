<section class="categories-section products-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="categories-intro mb-4">
                    <h2 class="categories-heading">Our Products</h2>
                    <p class="categories-subheading">Browse our pharmaceutical products and submit an enquiry for pricing and availability.</p>
                </div>

                @if ($products->isNotEmpty())
                    <div class="products-toolbar mb-4">
                        <div class="products-toolbar-filters">
                            <div class="products-filter-field">
                                <label class="sr-only" for="productCategoryFilter">Filter by category</label>
                                <select class="products-filter-select" id="productCategoryFilter">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="products-filter-field products-filter-field--search">
                                <label class="sr-only" for="productSearch">Search products</label>
                                <span class="products-search-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </span>
                                <input type="search"
                                    class="products-search-input"
                                    id="productSearch"
                                    placeholder="Search products...">
                            </div>
                        </div>

                        <div class="products-view-toggle" role="group" aria-label="Product view">
                            <button type="button"
                                class="products-view-btn is-active"
                                id="productGridView"
                                data-view="grid"
                                aria-pressed="true"
                                aria-label="Grid view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                                </svg>
                            </button>
                            <button type="button"
                                class="products-view-btn"
                                id="productListView"
                                data-view="list"
                                aria-pressed="false"
                                aria-label="List view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif

                <div class="products-items products-view-grid row" id="productsItems">
                    @forelse ($products as $product)
                        @php
                            $searchText = strtolower(implode(' ', array_filter([
                                $product->title,
                                $product->cas_no,
                                $product->end_use,
                                $product->categories->pluck('title')->implode(' '),
                            ])));
                        @endphp
                        <div class="col-lg-4 col-md-6 mb-4 products-item"
                            data-product-item
                            data-categories="{{ $product->categories->pluck('id')->implode(',') }}"
                            data-search="{{ $searchText }}">
                            <article class="product-card h-100">
                                <a href="{{ url('/products/'.$product->slug) }}" class="product-card-link">
                                    <div class="product-card-image-wrap">
                                        @if ($product->feature_image)
                                            <img src="{{ $product->feature_image_url }}" alt="{{ $product->title }}" class="product-card-image">
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

                                        @if ($product->categories->isNotEmpty())
                                            <div class="product-card-tags">
                                                @foreach ($product->categories->take(3) as $category)
                                                    <span class="product-card-tag">{{ $category->title }}</span>
                                                @endforeach
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

                <div class="categories-empty products-filter-empty d-none" id="productsFilterEmpty">
                    No products match your search or filter.
                </div>
            </div>

            <div class="col-lg-4">
                @include('components.frontend.categories.enquiry-form', ['products' => $enquiryProducts])
            </div>
        </div>
    </div>
</section>
