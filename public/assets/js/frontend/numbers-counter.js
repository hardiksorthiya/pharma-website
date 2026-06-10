(function () {
    var counters = document.querySelectorAll('[data-counter]');

    if (!counters.length) {
        return;
    }

    function formatValue(value, separator) {
        var num = Math.floor(value);

        if (!separator) {
            return String(num);
        }

        return String(num).replace(/\B(?=(\d{3})+(?!\d))/g, separator);
    }

    function runCounter(el) {
        var target = parseFloat(el.dataset.target) || 0;
        var suffix = el.dataset.suffix || '';
        var prefix = el.dataset.prefix || '';
        var separator = el.dataset.separator || '';
        var duration = parseInt(el.dataset.duration, 10) || 2000;
        var startTime = null;

        function step(timestamp) {
            if (!startTime) {
                startTime = timestamp;
            }

            var progress = Math.min((timestamp - startTime) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            var current = target * eased;

            el.textContent = prefix + formatValue(current, separator) + suffix;

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                el.textContent = prefix + formatValue(target, separator) + suffix;
            }
        }

        requestAnimationFrame(step);
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting && entry.target.dataset.counted !== 'true') {
                entry.target.dataset.counted = 'true';
                runCounter(entry.target);
            }
        });
    }, { threshold: 0.35 });

    counters.forEach(function (el) {
        observer.observe(el);
    });
})();
