$.fn.extend({
    nav: function (params) {
        var self = this;
        var settings = {};

        $.extend(settings, params);

        $(settings.btn).on('click', function () {
            $(self).slideToggle(300);
        });
    }
});
