<section class="blog-detail-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{ route('frontend.events.index') }}" class="blog-detail-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Back to Events
                </a>

                <article class="blog-detail">
                    @if ($event->featured_image_url)
                        <div class="blog-detail-image-wrap">
                            <img src="{{ $event->featured_image_url }}" alt="{{ $event->title }}" class="blog-detail-image">
                        </div>
                    @endif

                    <div class="blog-detail-meta">
                        @if ($event->event_date)
                            <time class="blog-detail-date" datetime="{{ $event->event_date->toDateString() }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                                {{ $event->event_date->format('F d, Y') }}
                            </time>
                        @endif

                        <div class="blog-detail-tags">
                            <span class="blog-detail-tag">Event</span>
                        </div>
                    </div>

                    <h1 class="blog-detail-title">{{ $event->title }}</h1>

                    @if ($event->description)
                        <div class="blog-detail-content">
                            {!! $event->description !!}
                        </div>
                    @endif

                    @if ($event->images->count() > 1)
                        <div class="event-detail-gallery">
                            <div class="event-detail-gallery-grid">
                                @foreach ($event->images as $image)
                                    <a href="{{ $image->image_url }}" class="event-detail-gallery-item" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ $image->image_url }}" alt="{{ $event->title }} gallery image">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </article>

                <nav class="blog-detail-nav" aria-label="Event navigation">
                    @if ($previousEvent)
                        <a href="{{ route('frontend.events.show', $previousEvent) }}" class="blog-detail-nav-link blog-detail-nav-link--prev">
                            <span class="blog-detail-nav-label">Previous Event</span>
                            <span class="blog-detail-nav-title">{{ $previousEvent->title }}</span>
                        </a>
                    @else
                        <span class="blog-detail-nav-link blog-detail-nav-link--prev is-disabled" aria-disabled="true">
                            <span class="blog-detail-nav-label">Previous Event</span>
                            <span class="blog-detail-nav-title">No earlier events</span>
                        </span>
                    @endif

                    @if ($nextEvent)
                        <a href="{{ route('frontend.events.show', $nextEvent) }}" class="blog-detail-nav-link blog-detail-nav-link--next">
                            <span class="blog-detail-nav-label">Next Event</span>
                            <span class="blog-detail-nav-title">{{ $nextEvent->title }}</span>
                        </a>
                    @else
                        <span class="blog-detail-nav-link blog-detail-nav-link--next is-disabled" aria-disabled="true">
                            <span class="blog-detail-nav-label">Next Event</span>
                            <span class="blog-detail-nav-title">No later events</span>
                        </span>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</section>
