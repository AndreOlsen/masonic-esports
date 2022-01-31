jQuery(document).ready(function($) {
    $('#burger-menu').click(function () {
        $('.main-menu__mobile').toggleClass('main-menu__mobile--open');
    });

    $('.main-menu__mobile').click(function () {
        $(this).toggleClass('main-menu__mobile--open');
    });
} );