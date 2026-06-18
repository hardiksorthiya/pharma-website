(function () {
    'use strict';

    function updateToggleLabel(wrapper) {
        var toggleLabel = wrapper.querySelector('.admin-checkbox-multiselect-text');
        var toggle = wrapper.querySelector('.admin-checkbox-multiselect-toggle');
        var checked = wrapper.querySelectorAll('.admin-checkbox-multiselect-option input[type="checkbox"]:checked');
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
            var option = input.closest('.admin-checkbox-multiselect-option');
            var text = option ? option.querySelector('.admin-checkbox-multiselect-option-text') : null;

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
        var options = wrapper.querySelectorAll('.admin-checkbox-multiselect-option');
        var noResults = wrapper.querySelector('.admin-checkbox-multiselect-no-results');
        var normalizedQuery = query.trim().toLowerCase();
        var visibleCount = 0;

        options.forEach(function (option) {
            var textElement = option.querySelector('.admin-checkbox-multiselect-option-text');
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
        var search = wrapper.querySelector('.admin-checkbox-multiselect-search');

        if (!search) {
            return;
        }

        search.value = '';
        filterOptions(wrapper, '');
    }

    function closeAll(except) {
        document.querySelectorAll('.admin-checkbox-multiselect.is-open').forEach(function (wrapper) {
            if (except && wrapper === except) {
                return;
            }

            wrapper.classList.remove('is-open');
            resetSearch(wrapper);

            var toggle = wrapper.querySelector('.admin-checkbox-multiselect-toggle');

            if (toggle) {
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    function openMultiselect(wrapper) {
        var toggle = wrapper.querySelector('.admin-checkbox-multiselect-toggle');
        var search = wrapper.querySelector('.admin-checkbox-multiselect-search');

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
        var toggle = wrapper.querySelector('.admin-checkbox-multiselect-toggle');
        var menu = wrapper.querySelector('.admin-checkbox-multiselect-menu');
        var search = wrapper.querySelector('.admin-checkbox-multiselect-search');

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
