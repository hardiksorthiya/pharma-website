(function () {
    'use strict';

    var nameInput = document.getElementById('name');
    var slugInput = document.getElementById('slug');

    if (!nameInput || !slugInput) {
        return;
    }

    var slugManuallyEdited = slugInput.value.trim().length > 0;

    slugInput.addEventListener('input', function () {
        slugManuallyEdited = slugInput.value.trim().length > 0;
    });

    nameInput.addEventListener('input', function () {
        if (slugManuallyEdited) {
            return;
        }

        slugInput.value = nameInput.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    });
})();
