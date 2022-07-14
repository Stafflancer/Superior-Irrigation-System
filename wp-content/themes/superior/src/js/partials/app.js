(function ($) {
    new WOW().init();

    // Mobile menu open/close
    var burgerBtn = $('.burger-btn');
    var menu = $('header .h-menu-holder .h-menu');
    if (burgerBtn.length && menu.length) {
        burgerBtn.on('click', function () {
            menu.fadeToggle(150);
        });
    }
})(jQuery);