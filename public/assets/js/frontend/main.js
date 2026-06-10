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
