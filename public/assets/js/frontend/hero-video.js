window.playActiveHeroVideos = function () {
    document.querySelectorAll('.hero-video').forEach(function (video) {
        video.pause();
    });

    var activeVideo = document.querySelector('.hero-slider .slick-current .hero-video')
        || document.querySelector('.hero-slider-wrap > .hero-slide .hero-video');

    if (activeVideo) {
        activeVideo.play().catch(function () {});
    }
};

document.addEventListener('DOMContentLoaded', function () {
    window.playActiveHeroVideos();
});
