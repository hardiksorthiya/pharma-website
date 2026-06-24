<section class="categories-section product-subcategories-section">
    <div class="container">
        <div class="categories-intro mb-4">
            <h2 class="categories-heading">Sub Categories</h2>
            @if ($category->description)
                <p class="categories-subheading">{{ $category->description }}</p>
            @else
                <p class="categories-subheading">Choose a sub category to browse related products.</p>
            @endif
        </div>

        <div class="row">
            @forelse ($subCategories as $subCategory)
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('frontend.products.sub-category', [$category, $subCategory]) }}"
                        class="category-card-link">
                        <article class="category-card h-100">
                            <div class="category-card-image-wrap">
                                @if ($subCategory->image)
                                    <img src="{{ $subCategory->image_url }}" alt="{{ $subCategory->title }}" class="category-card-image">
                                @else
                                    <div class="category-card-image category-card-image--placeholder" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="category-card-body">
                                <h3 class="category-card-title">{{ $subCategory->title }}</h3>
                                @if ($subCategory->description)
                                    <p class="category-card-desc">{{ Str::limit($subCategory->description, 120) }}</p>
                                @endif
                                <span class="category-card-count">{{ $subCategory->products_count }} {{ Str::plural('Product', $subCategory->products_count) }}</span>
                            </div>
                        </article>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="categories-empty">No sub categories available for this category yet.</div>
                </div>
            @endforelse
        </div>
    </div>
</section>
