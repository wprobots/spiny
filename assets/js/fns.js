
jQuery(document).ready(function ($) {


});
jQuery(document).on('touch click', '.spiny_main_nav_mobile_btn', function () {
    jQuery('nav').addClass('open');
    jQuery('body').addClass('overflow_hidden');
});
jQuery(document).on('touch click', '.spiny_main_nav_mobile_close', function () {
    jQuery('nav').removeClass('open');
    jQuery('body').removeClass('overflow_hidden');
});



// jQuery(document).on('click touch','.search_link', function () {
//     jQuery('.header_search_form').fadeIn(250);
//
//     return false;
// });
// jQuery(document).on('click touch','.search_close', function () {
//     jQuery('.header_search_form').fadeOut(250);
//
//     return false;
// });

