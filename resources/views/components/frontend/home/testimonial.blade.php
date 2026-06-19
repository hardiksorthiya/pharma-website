@php
    $testimonials = [
        [
            'quote' => 'Their laboratory services consistently deliver accurate, reliable results that support our research with confidence.',
            'name' => 'Prof. Arjun Malhotra',
            'role' => 'Department of Life Science',
            'avatar' => 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=100&q=80',
        ],
        [
            'quote' => 'The team\'s commitment to quality and scientific integrity has made them a trusted partner for our clinical studies.',
            'name' => 'Dr. Priya Sharma',
            'role' => 'Clinical Research Director',
            'avatar' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=100&q=80',
        ],
        [
            'quote' => 'Exceptional precision in testing and analysis. Their validated methods and timely reporting exceeded our expectations.',
            'name' => 'Dr. Michael Chen',
            'role' => 'Biomedical Research Lead',
            'avatar' => 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=100&q=80',
        ],
        [
            'quote' => 'Professional, responsive, and thorough. They helped us meet strict regulatory standards with complete documentation.',
            'name' => 'Dr. Sarah Williams',
            'role' => 'Quality Assurance Manager',
            'avatar' => 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=100&q=80',
        ],
        [
            'quote' => 'A reliable laboratory partner for complex research projects. Their expertise and technology are truly world-class.',
            'name' => 'Prof. David Okonkwo',
            'role' => 'Pharmaceutical Sciences',
            'avatar' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=100&q=80',
        ],
    ];
@endphp

<section class="testimonials-section home-reveal home-parallax" data-home-reveal data-home-parallax>
    <div class="container">
        <div class="row testimonials-header align-items-end home-reveal-item">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <span class="testimonials-badge">
                    <span class="testimonials-badge-dot"></span>
                    Our Testimonials
                </span>
                <h2 class="testimonials-title">
                    <span class="testimonials-title-mark" aria-hidden="true"></span>
                    <span class="testimonials-title-line">Sharing stories of precision,</span>
                    <span class="testimonials-title-accent">quality, &amp; research</span>
                </h2>
            </div>
            <div class="col-lg-5">
                <p class="testimonials-intro">
                    Discover how our commitment to accuracy, scientific integrity, and innovative research
                    has delivered exceptional results for clients worldwide.
                </p>
                {{-- <a href="#" class="testimonials-cta">
                    <span>View All Testimonials</span>
                    <span class="testimonials-cta-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                        </svg>
                    </span>
                </a> --}}
            </div>
        </div>

        <div class="testimonials-slider-wrap home-reveal-item">
            <div class="testimonials-slider" id="testimonialsSlider">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-stars" aria-label="5 out of 5 stars">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                @endfor
                            </div>
                            <p class="testimonial-quote">&ldquo;{{ $testimonial['quote'] }}&rdquo;</p>
                            <div class="testimonial-divider"></div>
                            <div class="testimonial-footer">
                                <div>
                                    <p class="testimonial-name">{{ $testimonial['name'] }}</p>
                                    <p class="testimonial-role">{{ $testimonial['role'] }}</p>
                                </div>
                                <div class="testimonial-avatar-wrap">
                                    <img class="testimonial-avatar"
                                        src="{{ $testimonial['avatar'] }}"
                                        alt="{{ $testimonial['name'] }}">
                                    <span class="testimonial-quote-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.287Q11.5 5.5 11.5 4.5a3.5 3.5 0 0 0-3.5-3.5c-1.517 0-2.69.947-3.154 2.409a.5.5 0 0 0 .808.528A2.5 2.5 0 0 1 8 2.5c.966 0 1.5.444 1.5 2 0 .785-.08 1.573-.2 2.058H8a1 1 0 0 0-1 1v2.442a1 1 0 0 0 1 1h4zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q.062-.714.062-1.287C4.5 5.5 4.5 4.5 4.5 4.5a3.5 3.5 0 0 0-3.5-3.5c-1.517 0-2.69.947-3.154 2.409a.5.5 0 0 0 .808.528A2.5 2.5 0 0 1 4 2.5c.966 0 1.5.444 1.5 2 0 .785-.08 1.573-.2 2.058H3a1 1 0 0 0-1 1v2.442a1 1 0 0 0 1 1h4z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick/slick-theme.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/frontend/testimonials-slider.js') }}"></script>
@endpush
