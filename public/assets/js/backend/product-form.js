(function () {
    'use strict';

    var titleInput = document.getElementById('title');
    var slugInput = document.getElementById('slug');

    if (titleInput && slugInput) {
        var slugManuallyEdited = slugInput.value.trim().length > 0;

        slugInput.addEventListener('input', function () {
            slugManuallyEdited = slugInput.value.trim().length > 0;
        });

        titleInput.addEventListener('input', function () {
            if (slugManuallyEdited) {
                return;
            }

            slugInput.value = titleInput.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        });
    }

    var categoryWrapper = document.getElementById('product_category_id-wrapper');
    var categoryInput = document.getElementById('product_category_id');
    var subCategoryDataEl = document.getElementById('productSubCategoryData');

    if ((!categoryInput && !categoryWrapper) || !subCategoryDataEl || !window.AdminSingleSelect) {
        return;
    }

    var allSubCategories = [];

    try {
        allSubCategories = JSON.parse(subCategoryDataEl.textContent || '[]');
    } catch (error) {
        allSubCategories = [];
    }

    function getSubCategoryItems(categoryId) {
        if (!categoryId) {
            return [];
        }

        return allSubCategories
            .filter(function (subCategory) {
                return String(subCategory.product_category_id) === String(categoryId);
            })
            .map(function (subCategory) {
                return {
                    value: String(subCategory.id),
                    label: subCategory.title
                };
            });
    }

    function getCategoryId() {
        if (categoryInput) {
            return categoryInput.value;
        }

        return window.AdminSingleSelect.getValue('product_category_id');
    }

    function refreshSubCategories(resetSelection) {
        var categoryId = getCategoryId();
        var currentValue = resetSelection ? '' : window.AdminSingleSelect.getValue('product_sub_category_id');

        window.AdminSingleSelect.setOptions(
            'product_sub_category_id',
            getSubCategoryItems(categoryId),
            currentValue
        );
    }

    if (categoryInput) {
        categoryInput.addEventListener('change', function () {
            refreshSubCategories(true);
        });
    }

    if (categoryWrapper) {
        categoryWrapper.addEventListener('single-select:change', function () {
            refreshSubCategories(true);
        });
    }

    refreshSubCategories(false);
})();
