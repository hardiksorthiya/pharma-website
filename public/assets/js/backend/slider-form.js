(function () {
    var typeField = document.getElementById('background_type');
    var imageField = document.getElementById('sliderImageField');
    var videoField = document.getElementById('sliderVideoField');

    if (!typeField || !imageField || !videoField) {
        return;
    }

    function toggleBackgroundFields() {
        var isVideo = typeField.value === 'video';

        imageField.style.display = 'block';
        videoField.style.display = isVideo ? 'block' : 'none';
    }

    typeField.addEventListener('change', toggleBackgroundFields);
    toggleBackgroundFields();
})();
