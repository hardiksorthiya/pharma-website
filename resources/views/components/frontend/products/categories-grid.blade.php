<section class="categories-section product-categories-section">
    <div class="container">
        <div class="products-page-intro">
            <p>
                Our product portfolio is supported by quality-focused manufacturing, regulatory expertise,
                and reliable global supply capabilities, enabling us to serve pharmaceutical importers,
                distributors, hospitals, institutions, and healthcare organizations across international markets.
            </p>
        </div>

        <div class="categories-intro products-portfolio-heading">
            <span class="products-portfolio-badge">
                <span class="products-portfolio-badge-dot"></span>
                Product Portfolio
            </span>
            <h2 class="categories-heading">Explore Our Product Portfolio</h2>
            <p class="categories-subheading">Browse our product categories below to explore our pharmaceutical and healthcare solutions.</p>
        </div>

        <div class="row">
            @forelse ($categories as $category)
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('frontend.products.category', $category) }}"
                        class="category-card-link">
                        <article class="category-card h-100">
                            <div class="category-card-image-wrap">
                                @if ($category->image)
                                    <img src="{{ $category->image_url }}" alt="{{ $category->title }}" class="category-card-image">
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
                                <h3 class="category-card-title">{{ $category->title }}</h3>
                                @if ($category->description)
                                    <p class="category-card-desc">{{ Str::limit(strip_tags($category->description), 120) }}</p>
                                @endif
                                <span class="category-card-count">{{ $category->products_count }} {{ Str::plural('Product', $category->products_count) }}</span>
                            </div>
                        </article>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="categories-empty">No product categories available yet.</div>
                </div>
            @endforelse
        </div>

        <div class="products-cta-stack">
            <article class="products-cta-card">
                <h3 class="products-cta-title">Can&rsquo;t Find the Product You Need?</h3>
                <p class="products-cta-text">
                    If you cannot find the product you are looking for in the categories above, share your specific
                    requirement with us. Our team will work with you to identify, source, or develop a suitable
                    solution based on your product specifications and market requirements.
                </p>
                <a href="{{ url('/contact-us') }}#contactForm" class="products-cta-link">Send Your Product Requirement →</a>
            </article>

            <article class="products-cta-card">
                <h3 class="products-cta-title">Looking for an Orphan or Rare Disease Medicine?</h3>
                <p class="products-cta-text">
                    We understand that sourcing orphan drugs and medicines for rare diseases can be challenging.
                    Share your specific product requirement with our team, and we will explore suitable sourcing
                    and supply options through our pharmaceutical network.
                </p>
                <a href="{{ url('/contact-us') }}#contactForm" class="products-cta-link">Upload Your Orphan Drug Requirement →</a>
            </article>
        </div>
    </div>
</section>
