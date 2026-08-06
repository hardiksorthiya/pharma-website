<section class="features-section home-reveal home-parallax" data-home-reveal data-home-parallax>
    <div class="container">
        <div class="row features-header align-items-end home-reveal-item">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <span class="features-badge">
                    <span class="features-badge-dot"></span>
                    Our Features
                </span>
                <h2 class="features-title">
                    Reliable features that drive
                    <span class="features-title-accent">scientific excellence</span>
                </h2>
            </div>
            <div class="col-lg-5">
                <p class="features-intro cursor-zoom">
                    We are committed to delivering reliable laboratory services, precise analysis,
                    and research support backed by scientific expertise and modern technology.
                </p>
                <a href="{{ url('/contact-us') }}" class="features-cta cursor-zoom">
                    <span>Contact Us</span>
                    <span class="features-cta-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>

        <div class="row features-grid">
            <div class="col-lg-4 mb-4 mb-lg-0 home-reveal-item">
                <div class="feature-media">
                    <img src="{{ asset('assets/images/sans1.webp') }}" alt="Scientists in laboratory">
                    <div class="feature-video-btn" aria-hidden="true">
                        <svg class="feature-video-ring" viewBox="0 0 120 120" aria-hidden="true">
                            <defs>
                                <path id="featureVideoCircle" d="M60,60 m-44,0 a44,44 0 1,1 88,0 a44,44 0 1,1 -88,0" />
                            </defs>
                            <text>
                                <textPath href="#featureVideoCircle" startOffset="0">
                                    Sanskriti Pharma • Sanskriti Pharma • Sanskriti Pharma •
                                </textPath>
                            </text>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0 home-reveal-item">
                <div class="features-stack">
                    <div class="feature-card feature-card--team">
                        <div class="feature-avatars">
                            <span class="feature-avatar"
                                style="background-image: url('https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=100&q=80');"></span>
                            <span class="feature-avatar"
                                style="background-image: url('https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=100&q=80');"></span>
                            <span class="feature-avatar"
                                style="background-image: url('https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=100&q=80');"></span>
                            <span class="feature-avatar"
                                style="background-image: url('https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=100&q=80');"></span>
                            <span class="feature-avatar"
                                style="background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=100&q=80');"></span>
                        </div>
                        <p class="feature-team-text">1500+ Experienced Team Members</p>
                    </div>

                    <div class="feature-card feature-card--contact">
                        <h3 class="feature-card-title">Contact Us Today!</h3>
                        <p class="feature-card-text">Contact us today to schedule a consultation or request a quote.</p>
                        @if ($settings->phone)
                        <a href="{{ $settings->phone_tel }}" class="feature-call-btn cursor-zoom">
                            <span>Call: {{ $settings->phone }}</span>
                            <span class="feature-call-btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                                </svg>
                            </span>
                        </a>
                        @endif
                        <img class="feature-microscope" src="{{ asset('assets/images/sans3.webp') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 home-reveal-item">
                <div class="features-stack">
                    <div class="feature-card feature-card--standards">
                        <h3 class="feature-card-title">Certified Quality Standards</h3>
                        <div class="feature-card-divider"></div>
                        <ul class="feature-list">
                            <li>
                                <span class="feature-list-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                    </svg>
                                </span>
                                Adherence globally recognized laboratory
                            </li>
                            <li>
                                <span class="feature-list-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                    </svg>
                                </span>
                                All procedures are scientifically validated
                            </li>
                            <li>
                                <span class="feature-list-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                    </svg>
                                </span>
                                Routine internal and external audits
                            </li>
                        </ul>
                    </div>

                    <div class="feature-media feature-media--small">
                        <img src="{{ asset('assets/images/sans2.webp') }}" alt="Scientist using microscope">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
