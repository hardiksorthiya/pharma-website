(function () {
    'use strict';

    var blogsItems = document.getElementById('blogsItems');
    var searchInput = document.getElementById('blogSearch');
    var gridViewBtn = document.getElementById('blogGridView');
    var listViewBtn = document.getElementById('blogListView');
    var filterEmpty = document.getElementById('blogsFilterEmpty');

    if (!blogsItems) {
        return;
    }

    var blogItems = blogsItems.querySelectorAll('[data-blog-item]');

    function getSearchQuery() {
        return searchInput ? searchInput.value.trim().toLowerCase() : '';
    }

    function blogMatchesSearch(item, query) {
        if (!query) {
            return true;
        }

        var searchText = item.getAttribute('data-search') || '';

        return searchText.indexOf(query) !== -1;
    }

    function applyFilters() {
        var query = getSearchQuery();
        var visibleCount = 0;

        blogItems.forEach(function (item) {
            var isVisible = blogMatchesSearch(item, query);

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
        blogsItems.classList.remove('blogs-view-grid', 'blogs-view-list');
        blogsItems.classList.add(view === 'list' ? 'blogs-view-list' : 'blogs-view-grid');

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
