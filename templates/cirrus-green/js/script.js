jQuery(document).ready(function ($) {

    var nextDiv = $('#header_wrap').next();

    $(window).on('resize', function () {
        $('.camera_wrap').height(($(window).height() * 0.6) - $('#header').height());
    }).trigger('resize');

    /*MENU RESPONSIVO*/

    $('.menuresp li.parent > a, .menuresp li.parent > span').append(' <button type="button"><i class="fas fa-chevron-down"></i></button>');

    $('.menuresp li.parent > span').click(function () {
        $(this).siblings('ul').slideToggle();
        $(this).find('i').toggleClass('fa-chevron-up', 'fa-chevron-down');
        // $('#nav-icon').removeClass('open');
        // $('.menuresp').slideUp();
    });

    $(window).on('resize', function () {

        $('.mainmenu-int').next('div').css('padding-top', $('.mainmenu-int #mainmenu').height());


        var menuresp = $(".gotomenu");

        $('.menuresp').css('top', $('#topmenu_wrap').outerHeight());

        menuresp.each(function () {
            if (!$(this).is(':visible')) {
                $('.menuresp').hide();
                $('#nav-icon').removeClass('open');
            }
        });

        $('.blog-home .img-intro').height($('.blog-home .img-intro').width() * 0.6);

        //Serviços artigo
        $('.servico-img').height($('.servico-img').width() * 0.75);

    }).trigger('resize');

    $('.menuresp').hide();

    $("#gotomenu").click(function () {
        $('.menuresp').slideToggle();
    });

    textClass($('.blog-home h2 a'));

    //ADD CLASS
    function textClass(classe) {
        classe.each(function (index, element) {
            var heading = $(element);
            var word_array, last_word, first_part;

            word_array = heading.html().split(/\s+/); // split on spaces
            last_word = word_array.pop();             // pop the last word
            first_part = word_array.join(' ');        // rejoin the first words together

            heading.html([first_part, ' <span class="last-word">', last_word, '</span>'].join(''));
        });
    }

    // $('#topmenu li').mouseover(function () {
    //     $(this).children('ul').width($(this).width());
    // }).mouseout(function () {
    //     $(this).children('ul').width('auto');
    // });

    $('.moduletable-endereco iframe').height(parseInt($('.moduletable-endereco iframe').width() * 0.6));

    $('#leftmenu .moduletable-menuint h3').html('Menu <i class="fas fa-bars"></i>');

    $('#leftmenu .moduletable-menuint h3').click(function () {
        $(this).siblings('ul').slideToggle();
        $(this).find('i').toggleClass('fa-times', 'fa-bars');
    });

    $(window).on('resize', function () {
        var menuserv = $("#leftmenu .moduletable-menuint h3");

        menuserv.each(function () {
            if (!$(this).is(':visible')) {
                $("#leftmenu .moduletable-menuint ul").show();
            }else{
                $('#leftmenu .moduletable-menuint h3').html('Menu <i class="fas fa-bars"></i>');
                $("#leftmenu .moduletable-menuint ul").hide();
            }
        });

    }).trigger('resize');

    $('#btn-login').click(function () {
        $('#login-form').slideToggle();
    });

    $('#btn-logout').click(function () {
        $('#logout-form').slideToggle();
    });

});

jQuery(window).load(function () {

    jQuery(window).on('resize', function () {
        var outerHeight = 0;
        jQuery('#content-menu_wrap_bg').siblings('div').each(function () {
            outerHeight += parseInt(jQuery(this).height());
        });
        jQuery('#content-menu_wrap_bg').css('min-height', parseInt(jQuery(window).height() - outerHeight + 1));
    }).trigger('resize');

});