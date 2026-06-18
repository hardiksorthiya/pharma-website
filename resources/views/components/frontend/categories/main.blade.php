<section class="categories-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="categories-intro mb-4">
                    <h2 class="categories-heading">Browse Categories</h2>
                    <p class="categories-subheading">Explore our pharmaceutical product categories and submit an enquiry for the products you need.</p>
                </div>

                <div class="row">
                    @forelse ($categories as $category)
                        <div class="col-md-6 mb-4">
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
                                        <p class="category-card-desc">{{ Str::limit($category->description, 120) }}</p>
                                    @endif
                                    <span class="category-card-count">{{ $category->products_count }} {{ Str::plural('Product', $category->products_count) }}</span>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="categories-empty">No categories available yet.</div>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="col-lg-4">
                @include('components.frontend.categories.enquiry-form')
            </div>
        </div>
    </div>
</section>
