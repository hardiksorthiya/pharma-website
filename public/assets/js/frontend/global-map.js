(function () {
    var mapEl = document.getElementById('global-presence-map');
    var dataEl = document.getElementById('global-map-data');
    var tooltipEl = document.getElementById('gp-country-tooltip');

    if (!mapEl || !dataEl || !tooltipEl || typeof jsVectorMap === 'undefined') {
        return;
    }

    var data = JSON.parse(dataEl.textContent);
    var servedCountries = data.countries || [];
    var hqCode = 'IN';
    var allRegions = servedCountries.concat([hqCode]);
    var mapInstance = null;
    var tooltipVisible = false;

    var countryNames = {
        UG: 'Uganda', SO: 'Somalia', KE: 'Kenya', RW: 'Rwanda', BW: 'Botswana',
        GH: 'Ghana', LR: 'Liberia', MA: 'Morocco', CM: 'Cameroon', CI: "Côte d'Ivoire",
        NG: 'Nigeria', MU: 'Mauritius', BF: 'Burkina Faso', PH: 'Philippines', AF: 'Afghanistan',
        SA: 'Saudi Arabia', QA: 'Qatar', AE: 'United Arab Emirates', UZ: 'Uzbekistan',
        KZ: 'Kazakhstan', LT: 'Lithuania', RS: 'Serbia', RO: 'Romania', BR: 'Brazil',
        MX: 'Mexico', CO: 'Colombia', HN: 'Honduras', HT: 'Haiti', VE: 'Venezuela',
        SV: 'El Salvador', UY: 'Uruguay', JM: 'Jamaica', LC: 'Saint Lucia', BB: 'Barbados',
        FJ: 'Fiji', IN: 'India (Headquarters)',
    };

    function buildSeriesValues(filterCodes) {
        var values = {};

        if (!filterCodes) {
            servedCountries.forEach(function (code) {
                values[code] = 1;
            });
            values[hqCode] = 2;
            return values;
        }

        filterCodes.forEach(function (code) {
            values[code] = 1;
        });

        return values;
    }

    function applySeriesValues(filterCodes) {
        if (!mapInstance || !mapInstance.series || !mapInstance.series.regions) {
            return;
        }

        mapInstance.series.regions[0].setValues(buildSeriesValues(filterCodes));
    }

    function applyZoomBoost(factor) {
        if (!mapInstance || typeof mapInstance._setScale !== 'function') {
            return;
        }

        var boost = factor || 1.32;
        var maxScale = (mapInstance.params && mapInstance.params.zoomMax) || 12;
        var nextScale = Math.min(mapInstance.scale * boost, maxScale);

        mapInstance._setScale(
            nextScale,
            mapInstance._width / 2,
            mapInstance._height / 2,
            false,
            false
        );
    }

    function focusRegions(codes, animate) {
        if (!mapInstance || typeof mapInstance.setFocus !== 'function') {
            return;
        }

        var shouldAnimate = animate !== false;
        var isFullView = codes.length === allRegions.length;

        mapInstance.setFocus({
            regions: codes,
            animate: shouldAnimate,
        });

        if (!isFullView) {
            return;
        }

        setTimeout(function () {
            applyZoomBoost(1.32);
        }, shouldAnimate ? 420 : 80);
    }

    function positionTooltip(event) {
        var padding = 14;
        var x = event.clientX + padding;
        var y = event.clientY + padding;

        tooltipEl.style.left = x + 'px';
        tooltipEl.style.top = y + 'px';

        var rect = tooltipEl.getBoundingClientRect();
        var maxX = window.innerWidth - rect.width - 8;
        var maxY = window.innerHeight - rect.height - 8;

        if (rect.right > window.innerWidth - 8) {
            x = event.clientX - rect.width - padding;
        }

        if (rect.bottom > window.innerHeight - 8) {
            y = event.clientY - rect.height - padding;
        }

        tooltipEl.style.left = Math.max(8, Math.min(x, maxX)) + 'px';
        tooltipEl.style.top = Math.max(8, Math.min(y, maxY)) + 'px';
    }

    function showCountryTooltip(event, code) {
        var name = countryNames[code];

        if (!name) {
            hideCountryTooltip();
            return;
        }

        tooltipEl.textContent = name;
        tooltipEl.classList.add('is-visible');
        tooltipEl.setAttribute('aria-hidden', 'false');
        tooltipVisible = true;
        positionTooltip(event);
    }

    function hideCountryTooltip() {
        tooltipVisible = false;
        tooltipEl.classList.remove('is-visible');
        tooltipEl.setAttribute('aria-hidden', 'true');
        tooltipEl.textContent = '';

        if (mapInstance && mapInstance.tooltip) {
            mapInstance.tooltip.hide();
        }
    }

    mapInstance = new jsVectorMap({
        selector: '#global-presence-map',
        map: 'world',
        backgroundColor: 'transparent',
        bindTouchEvents: true,
        zoomButtons: true,
        zoomOnScroll: true,
        showTooltip: true,
        focusOn: {
            regions: allRegions,
            animate: false,
        },
        regionStyle: {
            initial: {
                fill: '#dce4ea',
                stroke: '#ffffff',
                strokeWidth: 0.6,
            },
            hover: {
                fill: '#0084A3',
                cursor: 'pointer',
            },
        },
        series: {
            regions: [{
                attribute: 'fill',
                scale: {
                    1: '#004d5f',
                    2: '#0084A3',
                },
                values: buildSeriesValues(null),
            }],
        },
        onRegionTooltipShow: function (event, tooltip, code) {
            event.preventDefault();
            tooltip.hide();

            if (!countryNames[code]) {
                hideCountryTooltip();
                return;
            }

            showCountryTooltip(event, code);
        },
        onRegionTooltipHide: function () {
            hideCountryTooltip();
        },
        onLoaded: function () {
            focusRegions(allRegions, false);
        },
    });

    mapEl.addEventListener('mousemove', function (event) {
        if (!tooltipVisible) {
            return;
        }

        positionTooltip(event);
    });

    mapEl.addEventListener('mouseleave', function () {
        hideCountryTooltip();
    });

    window.addEventListener('resize', function () {
        if (mapInstance && typeof mapInstance.updateSize === 'function') {
            mapInstance.updateSize();
        }
    });

    document.querySelectorAll('.gp-region-card').forEach(function (card) {
        card.addEventListener('click', function () {
            var codes = (card.getAttribute('data-codes') || '').split(',').filter(Boolean);
            var isActive = card.classList.contains('is-active');

            document.querySelectorAll('.gp-region-card').forEach(function (c) {
                c.classList.remove('is-active');
            });

            hideCountryTooltip();

            if (isActive) {
                applySeriesValues(null);
                focusRegions(allRegions, true);
            } else {
                card.classList.add('is-active');
                applySeriesValues(codes);
                focusRegions(codes, true);

                var mapSection = document.querySelector('.gp-map-section');
                if (mapSection) {
                    mapSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });
})();
