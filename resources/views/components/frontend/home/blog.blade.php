<section class="blog-section">
    <div class="container">
        <div class="blog-heading text-center">
            <span class="blog-badge">
                <span class="blog-badge-dot"></span>
                Latest Blog
            </span>
            <h2 class="blog-title">
                Latest insights from <span class="blog-title-blue">pharmaceutical</span>
                <span class="blog-title-teal">and healthcare</span>
            </h2>
        </div>

        <div class="row">
            @forelse ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <x-frontend.blog.card :blog="$blog" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted mb-0">No blog posts published yet.</p>
                </div>
            @endforelse
        </div>

        @if ($blogs->isNotEmpty())
            <div class="text-center mt-5">
                <a href="{{ route('frontend.blog.index') }}" class="btn header-cta">
                    <span>View All Blogs</span>
                    <span class="header-cta-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </span>
                </a>
            </div>
        @endif
    </div>
</section>
