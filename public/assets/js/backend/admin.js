(function () {
    var wrapper = document.getElementById('adminWrapper');
    var toggle = document.getElementById('sidebarToggle');
    var TABLET_BREAKPOINT = 992;

    if (!wrapper || !toggle) {
        return;
    }

    function isMobileOrTablet() {
        return window.innerWidth < TABLET_BREAKPOINT;
    }

    function applySidebarState() {
        if (isMobileOrTablet()) {
            wrapper.classList.add('sidebar-collapsed');
            return;
        }

        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            wrapper.classList.add('sidebar-collapsed');
        } else {
            wrapper.classList.remove('sidebar-collapsed');
        }
    }

    applySidebarState();

    toggle.addEventListener('click', function () {
        wrapper.classList.toggle('sidebar-collapsed');

        if (!isMobileOrTablet()) {
            localStorage.setItem('sidebarCollapsed', wrapper.classList.contains('sidebar-collapsed'));
        }
    });

    var resizeTimer;
    window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(applySidebarState, 150);
    });
})();
