@props(['blog'])

<article class="blog-card h-100">
    <a href="{{ route('frontend.blog.show', $blog) }}" class="blog-card-link">
        <div class="blog-card-image-wrap">
            @if ($blog->image_url)
                <img class="blog-card-image" src="{{ $blog->image_url }}" alt="{{ $blog->title }}">
            @else
                <div class="blog-card-image blog-card-image--placeholder" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    </svg>
                </div>
            @endif
            <span class="blog-card-image-overlay" aria-hidden="true"></span>

            @if ($blog->created_at)
                <time class="blog-card-date-badge" datetime="{{ $blog->created_at->toDateString() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg>
                    {{ $blog->created_at->format('M d, Y') }}
                </time>
            @endif
        </div>

        <div class="blog-card-body">
            @if ($blog->categories?->isNotEmpty())
                <div class="blog-card-tags">
                    @foreach ($blog->categories->take(2) as $category)
                        <span class="blog-card-tag">{{ $category->title }}</span>
                    @endforeach
                </div>
            @endif

            <h3 class="blog-card-title">{{ $blog->title }}</h3>

            @if ($blog->excerpt)
                <p class="blog-card-excerpt">{{ $blog->excerpt }}</p>
            @endif

            <span class="blog-card-cta cursor-zoom">
                <span>Read Article</span>
                <span class="blog-card-cta-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                </span>
            </span>
        </div>
    </a>
</article>
