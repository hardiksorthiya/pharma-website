(function () {
    'use strict';

    var eventsItems = document.getElementById('eventsItems');
    var searchInput = document.getElementById('eventSearch');
    var gridViewBtn = document.getElementById('eventGridView');
    var listViewBtn = document.getElementById('eventListView');
    var filterEmpty = document.getElementById('eventsFilterEmpty');

    if (!eventsItems) {
        return;
    }

    var eventItems = eventsItems.querySelectorAll('[data-event-item]');

    function getSearchQuery() {
        return searchInput ? searchInput.value.trim().toLowerCase() : '';
    }

    function eventMatchesSearch(item, query) {
        if (!query) {
            return true;
        }

        var searchText = item.getAttribute('data-search') || '';

        return searchText.indexOf(query) !== -1;
    }

    function applyFilters() {
        var query = getSearchQuery();
        var visibleCount = 0;

        eventItems.forEach(function (item) {
            var isVisible = eventMatchesSearch(item, query);

            item.classList.toggle('d-none', !isVisible);

            if (isVisible) {
                visibleCount++;
            }
        });

        if (filterEmpty) {
            filterEmpty.classList.toggle('d-none', visibleCount > 0);
        }
    }

    function setView(view) {
        eventsItems.classList.remove('blogs-view-grid', 'blogs-view-list');
        eventsItems.classList.add(view === 'list' ? 'blogs-view-list' : 'blogs-view-grid');

        if (gridViewBtn && listViewBtn) {
            var isGrid = view === 'grid';

            gridViewBtn.classList.toggle('is-active', isGrid);
            listViewBtn.classList.toggle('is-active', !isGrid);
            gridViewBtn.setAttribute('aria-pressed', isGrid ? 'true' : 'false');
            listViewBtn.setAttribute('aria-pressed', isGrid ? 'false' : 'true');
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }

    if (gridViewBtn) {
        gridViewBtn.addEventListener('click', function () {
            setView('grid');
        });
    }

    if (listViewBtn) {
        listViewBtn.addEventListener('click', function () {
            setView('list');
        });
    }
})();
