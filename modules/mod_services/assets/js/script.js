jQuery(document).ready(function ($) {

    $(window).on('resize', function () {

        $('#services .service').height($('#services .service').width() * 1.2);

    }).trigger('resize');

});