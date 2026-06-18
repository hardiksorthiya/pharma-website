(function () {
    'use strict';

    var titleInput = document.getElementById('title');
    var slugInput = document.getElementById('slug');

    if (!titleInput || !slugInput) {
        return;
    }

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
})();
