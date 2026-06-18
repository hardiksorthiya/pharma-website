(function () {
    'use strict';

    var productsItems = document.getElementById('productsItems');
    var categoryFilter = document.getElementById('productCategoryFilter');
    var searchInput = document.getElementById('productSearch');
    var gridViewBtn = document.getElementById('productGridView');
    var listViewBtn = document.getElementById('productListView');
    var filterEmpty = document.getElementById('productsFilterEmpty');

    if (!productsItems) {
        return;
    }

    var productItems = productsItems.querySelectorAll('[data-product-item]');

    function getSelectedCategory() {
        return categoryFilter ? categoryFilter.value : '';
    }

    function getSearchQuery() {
        return searchInput ? searchInput.value.trim().toLowerCase() : '';
    }

    function productMatchesCategory(item, categoryId) {
        if (!categoryId) {
            return true;
        }

        var categories = (item.getAttribute('data-categories') || '').split(',').filter(Boolean);

        return categories.indexOf(categoryId) !== -1;
    }

    function productMatchesSearch(item, query) {
        if (!query) {
            return true;
        }

        var searchText = item.getAttribute('data-search') || '';

        return searchText.indexOf(query) !== -1;
    }

    function applyFilters() {
        var categoryId = getSelectedCategory();
        var query = getSearchQuery();
        var visibleCount = 0;

        productItems.forEach(function (item) {
            var isVisible = productMatchesCategory(item, categoryId) && productMatchesSearch(item, query);

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
        productsItems.classList.remove('products-view-grid', 'products-view-list');
        productsItems.classList.add(view === 'list' ? 'products-view-list' : 'products-view-grid');

        if (gridViewBtn && listViewBtn) {
            var isGrid = view === 'grid';

            gridViewBtn.classList.toggle('is-active', isGrid);
            listViewBtn.classList.toggle('is-active', !isGrid);
            gridViewBtn.setAttribute('aria-pressed', isGrid ? 'true' : 'false');
            listViewBtn.setAttribute('aria-pressed', isGrid ? 'false' : 'true');
        }
    }

    if (categoryFilter) {
        categoryFilter.addEventListener('change', applyFilters);
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

    var urlCategory = new URLSearchParams(window.location.search).get('category');

    if (categoryFilter && urlCategory) {
        categoryFilter.value = urlCategory;
    }

    applyFilters();
})();
