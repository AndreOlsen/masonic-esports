jQuery(document).ready(function($) {
    const $mobileMenu = $('.main-menu__mobile');
    $('#burger-menu').click(function () {
        $mobileMenu.toggleClass('main-menu__mobile--open');
    });

    $mobileMenu.click(function () {
        $(this).toggleClass('main-menu__mobile--open');
    });
} );