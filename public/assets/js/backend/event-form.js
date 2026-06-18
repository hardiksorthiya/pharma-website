(function () {
    'use strict';

    var descriptionInput = document.getElementById('description');

    if (descriptionInput && window.jQuery && jQuery.fn.summernote) {
        jQuery(descriptionInput).summernote({
            height: 280,
            placeholder: 'Write event details here...',
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
