(function ($) {
    var $slider = $('#heroSlider');

    if (!$slider.length || typeof $.fn.slick !== 'function') {
        return;
    }

    var slideCount = parseInt($slider.data('slide-count'), 10) || $slider.children().length;
    var hasMultipleSlides = slideCount > 1;

    $slider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: hasMultipleSlides,
        fade: true,
        speed: 600,
        autoplay: hasMultipleSlides,
        autoplaySpeed: 5000,
        pauseOnHover: true,
        arrows: hasMultipleSlides,
        dots: hasMultipleSlides,
        adaptiveHeight: false,
        prevArrow: '<button type="button" class="hero-slider-arrow hero-slider-prev" aria-label="Previous slide"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/></svg></button>',
        nextArrow: '<button type="button" class="hero-slider-arrow hero-slider-next" aria-label="Next slide"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/></svg></button>',
    });

    $slider.on('init afterChange', function () {
        if (typeof window.playActiveHeroVideos === 'function') {
            window.playActiveHeroVideos();
        }
    });
})(jQuery);
