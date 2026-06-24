@props([
    'products',
    'categories' => collect(),
    'subCategories' => collect(),
    'enquiryProducts',
    'showCategoryFilter' => true,
    'heading' => 'Our Products',
    'subheading' => 'Browse our pharmaceutical products and submit an enquiry for pricing and availability.',
])

<section class="categories-section products-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="categories-intro mb-4">
                    <h2 class="categories-heading">{{ $heading }}</h2>
                    <p class="categories-subheading">{{ $subheading }}</p>
                </div>

                @if ($showCategoryFilter && ($categories->isNotEmpty() || $products->isNotEmpty()))
                    <div class="products-toolbar mb-4">
                        <div class="products-toolbar-filters">
                            @if ($categories->isNotEmpty())
                                <div class="products-filter-field">
                                    <label class="sr-only" for="productCategoryFilter">Filter by category</label>
                                    <select class="products-filter-select" id="productCategoryFilter">
                                        <option value="">All Categories</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="products-filter-field">
                                    <label class="sr-only" for="productSubCategoryFilter">Filter by sub category</label>
                                    <select class="products-filter-select" id="productSubCategoryFilter" disabled>
                                        <option value="">All Sub Categories</option>
                                    </select>
                                </div>
                            @endif

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

                    @if ($subCategories->isNotEmpty())
                        @php
                            $subCategoryFilterData = $subCategories->map(function ($subCategory) {
                                return [
                                    'id' => $subCategory->id,
                                    'title' => $subCategory->title,
                                    'product_category_id' => $subCategory->product_category_id,
                                ];
                            });
                        @endphp
                        <script type="application/json" id="productSubCategoryFilterData">
                            @json($subCategoryFilterData)
                        </script>
                    @endif
                @elseif (! $showCategoryFilter && $products->isNotEmpty())
                    <div class="products-toolbar mb-4">
                        <div class="products-toolbar-filters">
                            <div class="products-filter-field products-filter-field--search products-filter-field--full">
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

                @include('components.frontend.products.grid', ['products' => $products])

                <div class="categories-empty products-filter-empty d-none" id="productsFilterEmpty">
                    No products match your search or filter.
                </div>
            </div>

            <div class="col-lg-4">
                @include('components.frontend.categories.enquiry-form', [
                    'products' => $enquiryProducts,
                    'sticky' => false,
                ])
            </div>
        </div>
    </div>
</section>
