(function ($) {
    $(document).on('ready', function () {
        var logosCarousel = $('.logos_carousel');
        if (logosCarousel.length) {
            logosCarousel.each(function () {
                $(this).slick({
                    dots: false,
                    arrows: false,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                            }
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                            }
                        }
                    ]
                });
            });
        }
    });
})(jQuery);