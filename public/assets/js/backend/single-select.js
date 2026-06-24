(function () {
    'use strict';

    function getPlaceholder(wrapper) {
        return wrapper.getAttribute('data-placeholder') || 'Select option';
    }

    function updateLabel(wrapper) {
        var label = wrapper.querySelector('[data-single-select-label]');
        var input = wrapper.querySelector('[data-single-select-input]');
        var placeholder = getPlaceholder(wrapper);

        if (!label || !input) {
            return;
        }

        var selectedOption = wrapper.querySelector('[data-single-select-option].is-selected');

        if (!input.value || !selectedOption) {
            label.textContent = placeholder;
            label.classList.add('is-placeholder');
            return;
        }

        label.textContent = selectedOption.getAttribute('data-label') || placeholder;
        label.classList.remove('is-placeholder');
    }

    function filterOptions(wrapper, query) {
        var options = wrapper.querySelectorAll('[data-single-select-option]');
        var noResults = wrapper.querySelector('[data-single-select-no-results]');
        var normalizedQuery = query.trim().toLowerCase();
        var visibleCount = 0;

        options.forEach(function (option) {
            var text = (option.getAttribute('data-label') || '').trim().toLowerCase();
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
        var search = wrapper.querySelector('[data-single-select-search]');

        if (!search) {
            return;
        }

        search.value = '';
        filterOptions(wrapper, '');
    }

    function closeAll(except) {
        document.querySelectorAll('.admin-single-select.is-open').forEach(function (wrapper) {
            if (except && wrapper === except) {
                return;
            }

            wrapper.classList.remove('is-open');
            resetSearch(wrapper);

            var toggle = wrapper.querySelector('[data-single-select-toggle]');

            if (toggle) {
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    function openSelect(wrapper) {
        var toggle = wrapper.querySelector('[data-single-select-toggle]');
        var search = wrapper.querySelector('[data-single-select-search]');

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

    function selectOption(wrapper, option) {
        var input = wrapper.querySelector('[data-single-select-input]');
        var value = option.getAttribute('data-value') || '';

        wrapper.querySelectorAll('[data-single-select-option]').forEach(function (item) {
            var isSelected = item === option;

            item.classList.toggle('is-selected', isSelected);
            item.setAttribute('aria-selected', isSelected ? 'true' : 'false');
        });

        if (input) {
            input.value = value;
            input.dispatchEvent(new Event('change', { bubbles: true }));
            wrapper.dispatchEvent(new CustomEvent('single-select:change', {
                bubbles: true,
                detail: { value: value }
            }));
        }

        updateLabel(wrapper);
        closeAll();
    }

    function bindOption(option, wrapper) {
        option.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            selectOption(wrapper, option);
        });
    }

    function renderOptions(wrapper, items, selectedValue) {
        var optionsContainer = wrapper.querySelector('[data-single-select-options]');
        var emptyState = wrapper.querySelector('[data-single-select-empty]');
        var menu = wrapper.querySelector('[data-single-select-menu]');
        var input = wrapper.querySelector('[data-single-select-input]');
        var searchWrap = wrapper.querySelector('.admin-checkbox-multiselect-search-wrap');
        var noResults = wrapper.querySelector('[data-single-select-no-results]');
        selectedValue = selectedValue !== null && selectedValue !== undefined ? String(selectedValue) : '';

        if (!optionsContainer || !menu) {
            return;
        }

        optionsContainer.innerHTML = '';

        if (!items.length) {
            if (searchWrap) {
                searchWrap.style.display = 'none';
            }

            if (noResults) {
                noResults.hidden = true;
            }

            if (emptyState) {
                emptyState.hidden = false;
            }

            if (input) {
                input.value = '';
            }

            updateLabel(wrapper);
            return;
        }

        if (emptyState) {
            emptyState.hidden = true;
        }

        if (searchWrap) {
            searchWrap.style.display = '';
        }

        items.forEach(function (item) {
            var value = String(item.value);
            var label = String(item.label);
            var option = document.createElement('button');

            option.type = 'button';
            option.className = 'admin-single-select-option';
            option.setAttribute('data-single-select-option', '');
            option.setAttribute('data-value', value);
            option.setAttribute('data-label', label);
            option.setAttribute('role', 'option');
            option.innerHTML = '<span class="admin-single-select-option-text"></span><span class="admin-single-select-option-check" aria-hidden="true"></span>';
            option.querySelector('.admin-single-select-option-text').textContent = label;

            if (value === selectedValue) {
                option.classList.add('is-selected');
                option.setAttribute('aria-selected', 'true');
            } else {
                option.setAttribute('aria-selected', 'false');
            }

            bindOption(option, wrapper);
            optionsContainer.appendChild(option);
        });

        if (input) {
            var hasSelected = items.some(function (item) {
                return String(item.value) === selectedValue;
            });

            input.value = hasSelected ? selectedValue : '';
        }

        updateLabel(wrapper);
        filterOptions(wrapper, wrapper.querySelector('[data-single-select-search]')?.value || '');
    }

    function initSingleSelect(wrapper) {
        if (wrapper.getAttribute('data-single-select-initialized') === 'true') {
            return wrapper;
        }

        var toggle = wrapper.querySelector('[data-single-select-toggle]');
        var menu = wrapper.querySelector('[data-single-select-menu]');
        var search = wrapper.querySelector('[data-single-select-search]');

        if (!toggle || !menu) {
            return wrapper;
        }

        wrapper.querySelectorAll('[data-single-select-option]').forEach(function (option) {
            bindOption(option, wrapper);
        });

        toggle.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();

            var isOpen = wrapper.classList.contains('is-open');
            closeAll();

            if (!isOpen) {
                openSelect(wrapper);
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

        wrapper.setAttribute('data-single-select-initialized', 'true');
        updateLabel(wrapper);

        return wrapper;
    }

    window.AdminSingleSelect = {
        init: initSingleSelect,
        setOptions: function (wrapper, items, selectedValue) {
            if (typeof wrapper === 'string') {
                wrapper = document.getElementById(wrapper + '-wrapper') || document.getElementById(wrapper);
            }

            if (!wrapper) {
                return;
            }

            initSingleSelect(wrapper);
            renderOptions(wrapper, items || [], selectedValue);
        },
        getValue: function (wrapper) {
            if (typeof wrapper === 'string') {
                wrapper = document.getElementById(wrapper + '-wrapper') || document.getElementById(wrapper);
            }

            var input = wrapper ? wrapper.querySelector('[data-single-select-input]') : null;

            return input ? input.value : '';
        }
    };

    document.addEventListener('click', function () {
        closeAll();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeAll();
        }
    });

    document.querySelectorAll('[data-single-select]').forEach(initSingleSelect);
})();
