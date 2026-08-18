<footer class="frontend-footer">
    <div class="container">
        <div class="row footer-main">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <x-site-logo class="footer-logo" icon-class="footer-logo-icon" text-class="footer-logo-text" />
                <p class="footer-about">
                    We support discovery across healthcare, biotechnology, and pharmaceutical sciences.
                </p>
            </div>

            <div class="col-md-6 col-lg-2 mb-5 mb-md-0">
                <h3 class="footer-col-title">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li><a href="{{ url('/oncology-solutions') }}">Oncology Solutions</a></li>
                    <li><a href="{{ url('/our-capabilities') }}">Our Capabilities</a></li>
                    <li><a href="{{ url('/global-presence') }}">Global Presence</a></li>
                    <li><a href="{{ url('/careers') }}">Careers</a></li>
                    <li><a href="{{ url('/blog') }}">Blog</a></li>
                    <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-md-6 col-lg-2 mb-5 mb-md-0">
                <h3 class="footer-col-title">Product Categories</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/products') }}">All Products</a></li>
                    @forelse ($footerProductCategories as $category)
                        <li>
                            <a href="{{ route('frontend.products.category', $category) }}">{{ $category->title }}</a>
                        </li>
                    @empty
                        <li><span class="footer-links-empty">No categories yet</span></li>
                    @endforelse
                </ul>
            </div>

            <div class="col-md-12 col-lg-4">
                <h3 class="footer-col-title">Follow Us On Social</h3>
                <p class="footer-social-text">
                    Connect with us online for updates, breakthroughs, and lab highlights.
                </p>
                <div class="footer-social">
                    <a href="#" class="footer-social-link" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                    </a>
                    <a href="#" class="footer-social-link" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.389.046-3.232c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-bottom-left">
                <p class="footer-copyright">Copyright &copy; {{ date('Y') }} All Rights Reserved.</p>
            </div>
            <div class="footer-bottom-center">
                <p class="footer-company-name">SANSKRITI PHARMA GLOBAL LLP</p>
                <p class="footer-company-id">LIP NUMBER: ACZ-8343</p>
            </div>
            <div class="footer-bottom-right">
                <p class="footer-credit">
                    Developed by
                    <a href="https://sorathwebsolution.com" target="_blank" rel="noopener noreferrer">Find Me Out Branding Solution</a>
                </p>
            </div>
        </div>
    </div>
</footer>
