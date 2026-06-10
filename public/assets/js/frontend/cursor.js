(function () {
    if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        return;
    }

    var cursor = document.getElementById('customCursor');

    if (!cursor) {
        return;
    }

    document.documentElement.classList.add('has-custom-cursor');

    var mouse = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
    var pos = { x: mouse.x, y: mouse.y };

    document.addEventListener('mousemove', function (e) {
        mouse.x = e.clientX;
        mouse.y = e.clientY;
    });

    document.querySelectorAll('a, button, input, textarea, select, label').forEach(function (el) {
        el.addEventListener('mouseenter', function () {
            if (!cursor.classList.contains('is-hidden')) {
                cursor.classList.add('is-hover');
            }
        });
        el.addEventListener('mouseleave', function () {
            cursor.classList.remove('is-hover');
        });
    });

    document.querySelectorAll('.cursor-zoom').forEach(function (el) {
        if (el.querySelector('.cursor-zoom-content')) {
            return;
        }

        var content = document.createElement('span');
        content.className = 'cursor-zoom-content';

        while (el.firstChild) {
            content.appendChild(el.firstChild);
        }

        el.appendChild(content);

        var ring = document.createElement('span');
        ring.className = 'cursor-zoom-ring';
        ring.setAttribute('aria-hidden', 'true');
        el.appendChild(ring);

        var reveal = content.cloneNode(true);
        reveal.className = 'cursor-zoom-reveal';
        reveal.setAttribute('aria-hidden', 'true');
        el.appendChild(reveal);

        function moveSpotlight(e) {
            var rect = el.getBoundingClientRect();
            var x = e.clientX - rect.left;
            var y = e.clientY - rect.top;

            ring.style.left = x + 'px';
            ring.style.top = y + 'px';
            reveal.style.setProperty('--cursor-x', x + 'px');
            reveal.style.setProperty('--cursor-y', y + 'px');
        }

        el.addEventListener('mouseenter', function (e) {
            cursor.classList.remove('is-hover');
            cursor.classList.add('is-hidden');
            el.classList.add('is-zoom-active');
            moveSpotlight(e);
        });

        el.addEventListener('mousemove', moveSpotlight);

        el.addEventListener('mouseleave', function () {
            cursor.classList.remove('is-hidden');
            el.classList.remove('is-zoom-active');
        });
    });

    function animate() {
        pos.x += (mouse.x - pos.x) * 0.18;
        pos.y += (mouse.y - pos.y) * 0.18;
        cursor.style.transform = 'translate(' + pos.x + 'px, ' + pos.y + 'px) translate(-50%, -50%)';
        requestAnimationFrame(animate);
    }

    animate();
})();
