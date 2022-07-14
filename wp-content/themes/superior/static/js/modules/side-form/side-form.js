!(function (n) {
    n(document).on("ready", function () {
        var o = n(".side-form .form-holder");
        if (o.length) {
            function t(n) {
                var o = n.closest(".hs-form-field").find("label:not(.hs-error-msg)");
                o.length && o.addClass("active");
            }
            function e(n) {
                var o = n,
                    t = o.closest(".hs-form-field").find("label:not(.hs-error-msg)");
                t.length && o.val().length <= 0 && t.removeClass("active");
            }
            o.on("focus", "input", function () {
                t(n(this));
            }),
                o.on("focus", "textarea", function () {
                    t(n(this));
                }),
                o.on("focusout", "input", function () {
                    e(n(this));
                }),
                o.on("focusout", "textarea", function () {
                    e(n(this));
                });
        }
    });
})(jQuery);
