(function () {
    'use strict';

    var productsItems = document.getElementById('productsItems');
    var categoryFilter = document.getElementById('productCategoryFilter');
    var subCategoryFilter = document.getElementById('productSubCategoryFilter');
    var searchInput = document.getElementById('productSearch');
    var gridViewBtn = document.getElementById('productGridView');
    var listViewBtn = document.getElementById('productListView');
    var filterEmpty = document.getElementById('productsFilterEmpty');
    var subCategoryDataEl = document.getElementById('productSubCategoryFilterData');

    if (!productsItems) {
        return;
    }

    var productItems = productsItems.querySelectorAll('[data-product-item]');
    var subCategories = [];

    if (subCategoryDataEl) {
        try {
            subCategories = JSON.parse(subCategoryDataEl.textContent);
        } catch (error) {
            subCategories = [];
        }
    }

    function getSelectedCategory() {
        return categoryFilter ? categoryFilter.value : '';
    }

    function getSelectedSubCategory() {
        return subCategoryFilter && !subCategoryFilter.disabled ? subCategoryFilter.value : '';
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

    function productMatchesSubCategory(item, subCategoryId) {
        if (!subCategoryId) {
            return true;
        }

        var subCategory = item.getAttribute('data-sub-categories') || '';

        return subCategory === subCategoryId;
    }

    function productMatchesSearch(item, query) {
        if (!query) {
            return true;
        }

        var searchText = item.getAttribute('data-search') || '';

        return searchText.indexOf(query) !== -1;
    }

    function populateSubCategoryOptions(categoryId, selectedSubCategoryId) {
        if (!subCategoryFilter) {
            return;
        }

        var options = '<option value="">All Sub Categories</option>';
        var hasOptions = false;

        if (categoryId) {
            subCategories.forEach(function (subCategory) {
                if (String(subCategory.product_category_id) === String(categoryId)) {
                    hasOptions = true;
                    var selected = String(subCategory.id) === String(selectedSubCategoryId) ? ' selected' : '';
                    options += '<option value="' + subCategory.id + '"' + selected + '>' + subCategory.title + '</option>';
                }
            });
        }

        subCategoryFilter.innerHTML = options;
        subCategoryFilter.disabled = !categoryId || !hasOptions;

        if (!categoryId || !hasOptions) {
            subCategoryFilter.value = '';
        }
    }

    function applyFilters() {
        var categoryId = getSelectedCategory();
        var subCategoryId = getSelectedSubCategory();
        var query = getSearchQuery();
        var visibleCount = 0;

        productItems.forEach(function (item) {
            var isVisible =
                productMatchesCategory(item, categoryId) &&
                productMatchesSubCategory(item, subCategoryId) &&
                productMatchesSearch(item, query);

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

    function onCategoryChange() {
        populateSubCategoryOptions(getSelectedCategory(), '');
        applyFilters();
    }

    if (categoryFilter) {
        categoryFilter.addEventListener('change', onCategoryChange);
    }

    if (subCategoryFilter) {
        subCategoryFilter.addEventListener('change', applyFilters);
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

    var urlParams = new URLSearchParams(window.location.search);
    var urlCategory = urlParams.get('category');
    var urlSubCategory = urlParams.get('sub_category');

    if (categoryFilter && urlCategory) {
        categoryFilter.value = urlCategory;
        populateSubCategoryOptions(urlCategory, urlSubCategory || '');
    }

    applyFilters();
})();
