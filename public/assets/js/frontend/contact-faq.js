(function ($) {
    'use strict';

    var $accordion = $('#contactFaqAccordion');

    if (!$accordion.length) {
        return;
    }

    $accordion.on('show.bs.collapse', function (e) {
        $(e.target).closest('.contact-faq-item').addClass('contact-faq-item--active');
    });

    $accordion.on('hide.bs.collapse', function (e) {
        $(e.target).closest('.contact-faq-item').removeClass('contact-faq-item--active');
    });
})(jQuery);
