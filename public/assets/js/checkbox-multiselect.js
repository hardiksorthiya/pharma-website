(function () {
    'use strict';

    function updateToggleLabel(wrapper) {
        var toggleLabel = wrapper.querySelector('[data-multiselect-label]');
        var toggle = wrapper.querySelector('[data-multiselect-toggle]');
        var checked = wrapper.querySelectorAll('[data-multiselect-option] input[type="checkbox"]:checked');
        var placeholder = wrapper.getAttribute('data-placeholder') || 'Select options';

        if (!toggleLabel || !toggle) {
            return;
        }

        if (!checked.length) {
            toggleLabel.textContent = placeholder;
            toggleLabel.classList.add('is-placeholder');
            return;
        }

        var labels = Array.prototype.map.call(checked, function (input) {
            var option = input.closest('[data-multiselect-option]');
            var text = option ? option.querySelector('[data-multiselect-option-text]') : null;

            return text ? text.textContent.trim() : '';
        }).filter(Boolean);

        toggleLabel.classList.remove('is-placeholder');

        if (labels.length <= 2) {
            toggleLabel.textContent = labels.join(', ');
            return;
        }

        toggleLabel.textContent = labels.length + ' selected';
    }

    function filterOptions(wrapper, query) {
        var options = wrapper.querySelectorAll('[data-multiselect-option]');
        var noResults = wrapper.querySelector('[data-multiselect-no-results]');
        var normalizedQuery = query.trim().toLowerCase();
        var visibleCount = 0;

        options.forEach(function (option) {
            var textElement = option.querySelector('[data-multiselect-option-text]');
            var text = textElement ? textElement.textContent.trim().toLowerCase() : '';
            var isMatch = !normalizedQuery || text.indexOf(normalizedQuery) !== -1;

            option.classList.toggle('is-hidden', !isMatch);

            if (isMatch) {
                visibleCount++;
            }
        });

        if (noResults) {
            noResults.hidden = visibleCount > 0;
        }
    }

    function resetSearch(wrapper) {
        var search = wrapper.querySelector('[data-multiselect-search]');

        if (!search) {
            return;
        }

        search.value = '';
        filterOptions(wrapper, '');
    }

    function closeAll(except) {
        document.querySelectorAll('[data-checkbox-multiselect].is-open').forEach(function (wrapper) {
            if (except && wrapper === except) {
                return;
            }

            wrapper.classList.remove('is-open');
            resetSearch(wrapper);

            var toggle = wrapper.querySelector('[data-multiselect-toggle]');

            if (toggle) {
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    function openMultiselect(wrapper) {
        var toggle = wrapper.querySelector('[data-multiselect-toggle]');
        var search = wrapper.querySelector('[data-multiselect-search]');

        wrapper.classList.add('is-open');

        if (toggle) {
            toggle.setAttribute('aria-expanded', 'true');
        }

        if (search) {
            window.setTimeout(function () {
                search.focus();
                search.select();
            }, 0);
        }
    }

    function initMultiselect(wrapper) {
        var toggle = wrapper.querySelector('[data-multiselect-toggle]');
        var menu = wrapper.querySelector('[data-multiselect-menu]');
        var search = wrapper.querySelector('[data-multiselect-search]');

        if (!toggle || !menu) {
            return;
        }

        toggle.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();

            var isOpen = wrapper.classList.contains('is-open');
            closeAll();

            if (!isOpen) {
                openMultiselect(wrapper);
            }
        });

        menu.addEventListener('click', function (event) {
            event.stopPropagation();
        });

        if (search) {
            search.addEventListener('input', function () {
                filterOptions(wrapper, search.value);
            });

            search.addEventListener('keydown', function (event) {
                event.stopPropagation();

                if (event.key === 'Escape') {
                    closeAll();
                }
            });
        }

        wrapper.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                updateToggleLabel(wrapper);
            });
        });

        updateToggleLabel(wrapper);
    }

    document.addEventListener('click', function () {
        closeAll();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeAll();
        }
    });

    document.querySelectorAll('[data-checkbox-multiselect]').forEach(initMultiselect);
})();
