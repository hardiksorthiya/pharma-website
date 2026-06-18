<section class="blog-detail-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{ route('frontend.blog.index') }}" class="blog-detail-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Back to Blog
                </a>

                <article class="blog-detail">
                    @if ($blog->image_url)
                        <div class="blog-detail-image-wrap">
                            <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="blog-detail-image">
                        </div>
                    @endif

                    <div class="blog-detail-meta">
                        @if ($blog->created_at)
                            <time class="blog-detail-date" datetime="{{ $blog->created_at->toDateString() }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                                {{ $blog->created_at->format('F d, Y') }}
                            </time>
                        @endif

                        @if ($blog->categories->isNotEmpty())
                            <div class="blog-detail-tags">
                                @foreach ($blog->categories as $category)
                                    <span class="blog-detail-tag">{{ $category->title }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <h1 class="blog-detail-title">{{ $blog->title }}</h1>

                    @if ($blog->description)
                        <div class="blog-detail-content">
                            {!! $blog->description !!}
                        </div>
                    @endif
                </article>

                <nav class="blog-detail-nav" aria-label="Blog post navigation">
                    @if ($previousBlog)
                        <a href="{{ route('frontend.blog.show', $previousBlog) }}" class="blog-detail-nav-link blog-detail-nav-link--prev">
                            <span class="blog-detail-nav-label">Previous Post</span>
                            <span class="blog-detail-nav-title">{{ $previousBlog->title }}</span>
                        </a>
                    @else
                        <span class="blog-detail-nav-link blog-detail-nav-link--prev is-disabled" aria-disabled="true">
                            <span class="blog-detail-nav-label">Previous Post</span>
                            <span class="blog-detail-nav-title">No older posts</span>
                        </span>
                    @endif

                    @if ($nextBlog)
                        <a href="{{ route('frontend.blog.show', $nextBlog) }}" class="blog-detail-nav-link blog-detail-nav-link--next">
                            <span class="blog-detail-nav-label">Next Post</span>
                            <span class="blog-detail-nav-title">{{ $nextBlog->title }}</span>
                        </a>
                    @else
                        <span class="blog-detail-nav-link blog-detail-nav-link--next is-disabled" aria-disabled="true">
                            <span class="blog-detail-nav-label">Next Post</span>
                            <span class="blog-detail-nav-title">No newer posts</span>
                        </span>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</section>
