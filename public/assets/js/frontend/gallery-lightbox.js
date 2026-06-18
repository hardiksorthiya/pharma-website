(function ($) {
    var $modal = $('#galleryLightbox');
    var $image = $('#galleryLightboxImage');
    var $prev = $modal.find('.gallery-lightbox-prev');
    var $next = $modal.find('.gallery-lightbox-next');
    var currentGroup = null;
    var currentIndex = 0;
    var groupItems = [];

    if (!$modal.length) {
        return;
    }

    function getGroupItems(groupId) {
        return $('[data-gallery-lightbox][data-gallery-group="' + groupId + '"]').toArray();
    }

    function showImage(index) {
        if (!groupItems.length) {
            return;
        }

        currentIndex = index;
        var $item = $(groupItems[currentIndex]);
        var imageUrl = $item.data('image-url');
        var imageAlt = $item.data('image-alt') || 'Gallery image';

        $image.attr('src', imageUrl).attr('alt', imageAlt);

        var hasMultiple = groupItems.length > 1;
        $prev.toggle(hasMultiple);
        $next.toggle(hasMultiple);
    }

    function openLightbox($trigger) {
        currentGroup = String($trigger.data('gallery-group'));
        groupItems = getGroupItems(currentGroup);
        currentIndex = Math.max(groupItems.indexOf($trigger[0]), 0);

        showImage(currentIndex);
        $modal.modal('show');
    }

    $(document).on('click', '[data-gallery-lightbox]', function () {
        openLightbox($(this));
    });

    $prev.on('click', function () {
        if (!groupItems.length) {
            return;
        }

        currentIndex = (currentIndex - 1 + groupItems.length) % groupItems.length;
        showImage(currentIndex);
    });

    $next.on('click', function () {
        if (!groupItems.length) {
            return;
        }

        currentIndex = (currentIndex + 1) % groupItems.length;
        showImage(currentIndex);
    });

    $(document).on('keydown', function (event) {
        if (!$modal.hasClass('show')) {
            return;
        }

        if (event.key === 'ArrowLeft') {
            event.preventDefault();
            $prev.trigger('click');
        }

        if (event.key === 'ArrowRight') {
            event.preventDefault();
            $next.trigger('click');
        }
    });

    $modal.on('hidden.bs.modal', function () {
        $image.attr('src', '').attr('alt', '');
        groupItems = [];
        currentGroup = null;
        currentIndex = 0;
    });
})(jQuery);
