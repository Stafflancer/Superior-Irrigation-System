(function ($) {
    $(document).on('ready', function () {
        var form = $('.side-form .form-holder');

        if(form.length) {
            form.on('focus', 'input', function() {
                onFocus($(this));
            });

            form.on('focus', 'textarea', function() {
                onFocus($(this));
            });

            form.on('focusout', 'input', function() {
                onFocusOut($(this));
            });

            form.on('focusout', 'textarea', function() {
                onFocusOut($(this));
            });

            function onFocus(el) {
                var self = el;
                var label = self.closest('.hs-form-field').find('label:not(.hs-error-msg)');

                if(label.length) {
                    label.addClass('active');
                }
            }

            function onFocusOut(el) {
                var self = el;
                var label = self.closest('.hs-form-field').find('label:not(.hs-error-msg)');

                if(label.length) {
                    if(self.val().length <= 0) {
                        label.removeClass('active');
                    }
                }
            }
        }
    });
})(jQuery);