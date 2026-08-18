(function () {
    var header = document.getElementById('frontendHeader');

    if (!header) {
        return;
    }

    var lastScrollY = window.scrollY || 0;
    var stickyThreshold = 120;
    var scrollDelta = 6;
    var ticking = false;

    function updateHeader() {
        var currentScrollY = window.scrollY || 0;

        if (currentScrollY <= stickyThreshold) {
            header.classList.remove('frontend-header--sticky', 'frontend-header--hidden');
        } else if (currentScrollY > lastScrollY + scrollDelta) {
            header.classList.add('frontend-header--hidden');
            header.classList.remove('frontend-header--sticky');
        } else if (currentScrollY < lastScrollY - scrollDelta) {
            header.classList.remove('frontend-header--hidden');
            header.classList.add('frontend-header--sticky');
        }

        lastScrollY = currentScrollY;
        ticking = false;
    }

    function onScroll() {
        if (!ticking) {
            window.requestAnimationFrame(updateHeader);
            ticking = true;
        }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);
    updateHeader();
})();
