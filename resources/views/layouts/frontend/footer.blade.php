<footer class="frontend-footer">
    <div class="container">
        <div class="footer-newsletter">
            <h2 class="footer-newsletter-title">Stay updated with the latest research insights</h2>
            <form class="footer-newsletter-form" action="#" method="post">
                @csrf
                <input type="email" class="footer-newsletter-input" name="email" placeholder="Enter Email Address*" required>
                <button type="submit" class="footer-newsletter-btn">
                    <span>Subscribe</span>
                    <span class="footer-newsletter-btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/>
                        </svg>
                    </span>
                </button>
            </form>
        </div>

        <div class="footer-divider"></div>

        <div class="row footer-main">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <a href="{{ url('/') }}" class="footer-logo">
                    <span class="footer-logo-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                        </svg>
                    </span>
                    <span class="footer-logo-text">{{ config('app.name', 'Sanskruti Pharma') }}</span>
                </a>
                <p class="footer-about">
                    We support discovery across healthcare, biotechnology, and pharmaceutical sciences.
                </p>
                <div class="footer-hours">
                    <p class="footer-hours-title">Working Hours:</p>
                    <ul class="footer-hours-list">
                        <li><span>Monday - Friday:</span><span>10:00 - 05:00</span></li>
                        <li><span>Saturday:</span><span>10:00 - 04:00</span></li>
                        <li><span>Sunday:</span><span>Closed</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-5 mb-md-0">
                <h3 class="footer-col-title">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li><a href="{{ url('/team') }}">Our Team</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Case Studies</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 mb-5 mb-md-0">
                <h3 class="footer-col-title">Our Services</h3>
                <ul class="footer-links">
                    <li><a href="#">Diagnostic Testing</a></li>
                    <li><a href="#">Laboratory Analysis</a></li>
                    <li><a href="#">Industrial Testing</a></li>
                    <li><a href="#">Clinical Testing</a></li>
                    <li><a href="#">Chemical Testing</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3">
                <h3 class="footer-col-title">Follow Us On Social</h3>
                <p class="footer-social-text">
                    Connect with us online for updates, breakthroughs, and lab highlights.
                </p>
                <div class="footer-social">
                    <a href="#" class="footer-social-link" aria-label="Pinterest">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 0 0-3.4 15.2c-.1-.8-.2-2 .1-2.9.2-.7 1.5-9.8 1.5-9.8s-.4-.8-.4-2c0-1.9 1.1-3.3 2.5-3.3 1.2 0 1.8.9 1.8 2 0 1.2-.8 3-1.2 4.7-.3 1.4.7 2.6 2.1 2.6 2.5 0 4.2-3.2 4.2-7 0-2.9-2-4.9-4.9-4.9-3.6 0-5.8 2.7-5.8 5.5 0 1 .4 2.1 1 2.7.1.1.1.2.1.3-.1.4-.3 1.3-.4 1.5-.1.2-.3.3-.5.2-1.4-.6-2.2-2.5-2.2-4 0-3.3 2.8-7.2 8.3-7.2 4.5 0 7.5 3.3 7.5 6.8 0 4.6-2.6 8.1-6.4 8.1-1.3 0-2.5-.7-2.9-1.5l-.8 3c-.3 1-.9 2.3-1.3 3.1A8 8 0 1 0 8 0z"/>
                        </svg>
                    </a>
                    <a href="#" class="footer-social-link" aria-label="X">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                        </svg>
                    </a>
                    <a href="#" class="footer-social-link" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                    </a>
                    <a href="#" class="footer-social-link" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.389.046-3.232c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="footer-copyright">Copyright &copy; {{ date('Y') }} All Rights Reserved.</p>
            <div class="footer-bottom-links">
                <a href="#">Privacy Policy</a>
                <span class="footer-bottom-dot" aria-hidden="true"></span>
                <a href="#">Legal Documents</a>
            </div>
        </div>
    </div>
</footer>
