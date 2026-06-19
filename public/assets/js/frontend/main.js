(function () {
    var toggle = document.getElementById('mobileMenuToggle');
    var closeBtn = document.getElementById('mobileSidebarClose');
    var sidebar = document.getElementById('mobileSidebar');
    var overlay = document.getElementById('mobileSidebarOverlay');
    var body = document.body;

    if (!toggle || !sidebar || !overlay) {
        return;
    }

    function openSidebar() {
        sidebar.classList.add('is-open');
        overlay.classList.add('is-visible');
        body.classList.add('mobile-menu-open');
        toggle.setAttribute('aria-expanded', 'true');
        sidebar.setAttribute('aria-hidden', 'false');
    }

    function closeSidebar() {
        sidebar.classList.remove('is-open');
        overlay.classList.remove('is-visible');
        body.classList.remove('mobile-menu-open');
        toggle.setAttribute('aria-expanded', 'false');
        sidebar.setAttribute('aria-hidden', 'true');
    }

    toggle.addEventListener('click', openSidebar);

    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }
    overlay.addEventListener('click', closeSidebar);

    sidebar.querySelectorAll('.mobile-menu-link, .mobile-submenu-link').forEach(function (link) {
        link.addEventListener('click', closeSidebar);
    });

    sidebar.querySelectorAll('.mobile-menu-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            var parent = toggle.closest('.mobile-menu-item--dropdown');
            if (parent) {
                parent.classList.toggle('is-open');
            }
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeSidebar();
        }
    });
})();

(function () {
    var revealItems = document.querySelectorAll('[data-about-entrance], [data-home-reveal]');

    if (!revealItems.length) {
        return;
    }

    document.documentElement.classList.add('has-reveal-animations');

    if (!('IntersectionObserver' in window)) {
        revealItems.forEach(function (item) {
            item.classList.add('is-in-view');
        });
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-in-view');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.25,
        rootMargin: '0px 0px -80px'
    });

    revealItems.forEach(function (item) {
        observer.observe(item);
    });
})();

(function () {
    var parallaxSections = document.querySelectorAll('[data-home-parallax]');
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var ticking = false;

    if (!parallaxSections.length || reduceMotion) {
        return;
    }

    function clamp(value, min, max) {
        return Math.min(Math.max(value, min), max);
    }

    function updateParallax() {
        var viewportHeight = window.innerHeight || document.documentElement.clientHeight;

        parallaxSections.forEach(function (section) {
            var rect = section.getBoundingClientRect();
            var sectionCenter = rect.top + (rect.height / 2);
            var viewportCenter = viewportHeight / 2;
            var progress = (viewportCenter - sectionCenter) / viewportHeight;
            var offset = clamp(progress * 26, -18, 18);

            section.style.setProperty('--parallax-y', offset.toFixed(2) + 'px');
        });

        ticking = false;
    }

    function requestUpdate() {
        if (!ticking) {
            window.requestAnimationFrame(updateParallax);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestUpdate, { passive: true });
    window.addEventListener('resize', requestUpdate);
    updateParallax();
})();
