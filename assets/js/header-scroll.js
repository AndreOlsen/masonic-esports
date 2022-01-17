jQuery(document).ready(function($) {
    $(window).scroll(function(e){
        $el = $('.site-header');
        $el.toggleClass('site-header--scrolled', $(this).scrollTop() > 0); 
    }); 
} );