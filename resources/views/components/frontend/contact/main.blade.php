<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="contact-card">
                    <h2 class="contact-card-title">Send Us a Message</h2>
                    <span class="contact-card-line" aria-hidden="true"></span>

                    <form class="contact-form" action="#" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="contact-label" for="contactName">Full Name <span class="contact-required">*</span></label>
                                <div class="contact-field">
                                    <span class="contact-field-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                    </span>
                                    <input type="text" class="contact-input" id="contactName" name="name" placeholder="Full Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="contact-label" for="contactEmail">Email Address <span class="contact-required">*</span></label>
                                <div class="contact-field">
                                    <span class="contact-field-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                        </svg>
                                    </span>
                                    <input type="email" class="contact-input" id="contactEmail" name="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="contact-label" for="contactPhone">Phone Number <span class="contact-required">*</span></label>
                                <div class="contact-field">
                                    <span class="contact-field-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/>
                                        </svg>
                                    </span>
                                    <input type="tel" class="contact-input" id="contactPhone" name="phone" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="contact-label" for="contactCompany">Company Name</label>
                                <div class="contact-field">
                                    <span class="contact-field-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm3.5-8.5a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0Z"/>
                                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Zm13 2v9.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1Z"/>
                                        </svg>
                                    </span>
                                    <input type="text" class="contact-input" id="contactCompany" name="company" placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label class="contact-label" for="contactSubject">Subject <span class="contact-required">*</span></label>
                                <div class="contact-field contact-field--select">
                                    <select class="contact-input contact-select" id="contactSubject" name="subject" required>
                                        <option value="" selected disabled>Select a subject</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="products">Product Information</option>
                                        <option value="partnership">Partnership &amp; Distribution</option>
                                        <option value="support">Customer Support</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span class="contact-select-chevron" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label class="contact-label" for="contactMessage">Your Message <span class="contact-required">*</span></label>
                                <div class="contact-field contact-field--textarea">
                                    <span class="contact-field-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.637c.393.389.83.775 1.306 1.148a9.02 9.02 0 0 0 1.544-1.16c.418.315.858.592 1.314.828l-1.379 1.14a1 1 0 0 1-1.328-.074l-1.06-1.06z"/>
                                        </svg>
                                    </span>
                                    <textarea class="contact-input contact-textarea" id="contactMessage" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn contact-submit">
                            <span>Send Message</span>
                            <span class="contact-submit-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-4.178-6.995-6.998-4.178a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM14.207 1.524 2.257 8.5l4.178 2.495 3.09-5.18 1.043 1.043-1.043 1.74 1.74 1.043-5.18 3.09 2.495 4.178 6.425-11.588Z"/>
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="contact-card contact-card--info">
                    <h2 class="contact-card-title">Get in Touch</h2>
                    <span class="contact-card-line" aria-hidden="true"></span>

                    <ul class="contact-info-list">
                        <li class="contact-info-item">
                            <span class="contact-info-icon contact-info-icon--blue">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328z"/>
                                </svg>
                            </span>
                            <div>
                                <h3 class="contact-info-title">Call Us</h3>
                                @if ($settings->phone)
                                    <p class="contact-info-text"><a href="{{ $settings->phone_tel }}">{{ $settings->phone }}</a></p>
                                @endif
                                <p class="contact-info-meta">Mon - Sat (9:00 AM - 6:00 PM)</p>
                            </div>
                        </li>
                        <li class="contact-info-item">
                            <span class="contact-info-icon contact-info-icon--blue">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                            </span>
                            <div>
                                <h3 class="contact-info-title">Email Us</h3>
                                @if ($settings->email)
                                    <p class="contact-info-text"><a href="{{ $settings->mailto }}">{{ $settings->email }}</a></p>
                                @endif
                                <p class="contact-info-meta">We reply within 24 hours</p>
                            </div>
                        </li>
                        <li class="contact-info-item">
                            <span class="contact-info-icon contact-info-icon--purple">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                            </span>
                            <div>
                                <h3 class="contact-info-title">Visit Us</h3>
                                @if ($settings->address)
                                    <p class="contact-info-text">{!! nl2br(e($settings->address)) !!}</p>
                                @endif
                            </div>
                        </li>
                        {{-- <li class="contact-info-item">
                            <span class="contact-info-icon contact-info-icon--green">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.354-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.152.276.312.557.466.858a6.7 6.7 0 0 0 .597-.933A9.268 9.268 0 0 0 7.5 12H5.145zm.582 3.5a6.973 6.973 0 0 0 .656-2.5h2.49a6.96 6.96 0 0 0-.656 2.5H5.727zm3.178-2.5h2.49a6.96 6.96 0 0 0 .656 2.5h-2.49a6.973 6.973 0 0 1-.656-2.5zM8.5 12.99c.337.386.708.752 1.087 1.087A7.025 7.025 0 0 0 13.745 12H8.5v.99zm1.913 1.14c.36.475.724.91 1.087 1.305A7.025 7.025 0 0 0 14.982 12h-2.49a12.5 12.5 0 0 1-.479 2.13zM10.5 12a9.27 9.27 0 0 0 .64 1.539 6.7 6.7 0 0 0 .597.933A7.025 7.025 0 0 0 13.745 12H10.5zm-2.99 0a7.025 7.025 0 0 0 3.608-2.472 6.7 6.7 0 0 0 .597-.933A9.27 9.27 0 0 0 10.5 12H7.51z"/>
                                </svg>
                            </span>
                            <div>
                                <h3 class="contact-info-title">Global Inquiries</h3>
                                <p class="contact-info-text"><a href="mailto:export@sanskrutipharma.com">export@sanskrutipharma.com</a></p>
                                <p class="contact-info-meta">For international business</p>
                            </div>
                        </li> --}}
                        <li class="contact-info-item">
                            <span class="contact-info-icon contact-info-icon--orange">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 1a5 5 0 0 0-5 5v1h1a4 4 0 0 1 4-4 4 4 0 0 1 4 4h1V6a5 5 0 0 0-5-5z"/>
                                    <path d="M3 8a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2.5a3.5 3.5 0 0 1-3.5 3.5h-3A3.5 3.5 0 0 1 3 10.5V8z"/>
                                </svg>
                            </span>
                            <div>
                                <h3 class="contact-info-title">Customer Support</h3>
                                <p class="contact-info-text"><a href="tel:+919876543211">+91 98765 43211</a></p>
                                <p class="contact-info-meta"><a href="mailto:support@sanskrutipharma.com">support@sanskrutipharma.com</a></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-map-section">
    <div class="container">
        <div class="contact-map-wrap">
            <iframe
                class="contact-map-iframe"
                src="{{ $settings->map_src }}"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Our location on Google Maps">
            </iframe>
        </div>
    </div>
</section>
