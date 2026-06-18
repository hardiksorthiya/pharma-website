<section class="blog-page-section">
    <div class="container">
        <div class="blog-page-intro mb-4">
            <h2 class="blog-page-heading">Latest Articles</h2>
            <p class="blog-page-subheading">Explore insights, updates, and news from pharmaceutical and healthcare research.</p>
        </div>

        @if ($blogs->isNotEmpty())
            <div class="products-toolbar blogs-toolbar mb-4">
                <div class="products-toolbar-filters">
                    <div class="products-filter-field products-filter-field--search">
                        <label class="sr-only" for="blogSearch">Search blogs</label>
                        <span class="products-search-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </span>
                        <input type="search"
                            class="products-search-input"
                            id="blogSearch"
                            placeholder="Search blogs...">
                    </div>
                </div>

                <div class="products-view-toggle" role="group" aria-label="Blog view">
                    <button type="button"
                        class="products-view-btn is-active"
                        id="blogGridView"
                        data-view="grid"
                        aria-pressed="true"
                        aria-label="Grid view">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                        </svg>
                    </button>
                    <button type="button"
                        class="products-view-btn"
                        id="blogListView"
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

        <div class="blogs-items blogs-view-grid row" id="blogsItems">
            @forelse ($blogs as $blog)
                @php
                    $searchText = strtolower(implode(' ', array_filter([
                        $blog->title,
                        $blog->excerpt,
                        $blog->categories->pluck('title')->implode(' '),
                    ])));
                @endphp
                <div class="col-6 col-md-4 col-lg-3 mb-4 blogs-item"
                    data-blog-item
                    data-search="{{ $searchText }}">
                    <x-frontend.blog.card :blog="$blog" />
                </div>
            @empty
                <div class="col-12">
                    <div class="blog-page-empty">No blog posts published yet.</div>
                </div>
            @endforelse
        </div>

        <div class="blog-page-empty products-filter-empty d-none" id="blogsFilterEmpty">
            No blog posts match your search.
        </div>
    </div>
</section>
