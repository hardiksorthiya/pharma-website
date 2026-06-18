(function () {
    'use strict';

    var titleInput = document.getElementById('title');
    var slugInput = document.getElementById('slug');
    var descriptionInput = document.getElementById('description');

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

    if (descriptionInput && window.jQuery && jQuery.fn.summernote) {
        jQuery(descriptionInput).summernote({
            height: 280,
            placeholder: 'Write your blog content here...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['codeview', 'fullscreen']]
            ]
        });
    }
})();
