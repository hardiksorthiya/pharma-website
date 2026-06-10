@php
    $blogs = [
        [
            'title' => 'Advancements In Modern Laboratory Testing Methods',
            'image' => 'https://images.unsplash.com/photo-1582719471137-c3967ffb1c42?auto=format&fit=crop&w=800&q=80',
            'url' => '#',
        ],
        [
            'title' => 'Ensuring Accuracy And Quality In Scientific Research',
            'image' => 'https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=800&q=80',
            'url' => '#',
        ],
        [
            'title' => 'The Role Of Laboratory Science In Healthcare Innovation',
            'image' => 'https://images.unsplash.com/photo-1532187863486-abf9db3811dd?auto=format&fit=crop&w=800&q=80',
            'url' => '#',
        ],
    ];
@endphp

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
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4 mb-md-0">
                    <article class="blog-card">
                        <a href="{{ $blog['url'] }}" class="blog-card-image-link">
                            <img class="blog-card-image"
                                src="{{ $blog['image'] }}"
                                alt="{{ $blog['title'] }}">
                        </a>
                        <h3 class="blog-card-title">
                            <a href="{{ $blog['url'] }}">{{ $blog['title'] }}</a>
                        </h3>
                        <a href="{{ $blog['url'] }}" class="blog-card-link">
                            <span>Read More</span>
                            <span class="blog-card-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                                </svg>
                            </span>
                        </a>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
