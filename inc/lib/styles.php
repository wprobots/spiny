<?php
/**
 * Enqueue scripts and styles.
 */
function wp_robots_scripts() {
    wp_enqueue_style(
        'spiny-css-owl',
        get_template_directory_uri() . '/assets/css/owl.carousel.min.css',
        false,
        filemtime(get_template_directory() . '/assets/css/owl.carousel.min.css'),
        false
    );
    wp_enqueue_style(
        'spiny-css-owl-theme',
        get_template_directory_uri() . '/assets/css/owl.theme.default.min.css',
        false,
        filemtime(get_template_directory() . '/assets/css/owl.theme.default.min.css'),
        false
    );
    wp_enqueue_style(
        'spiny-css-owl-magnific-popup',
        get_template_directory_uri() . '/assets/css/magnific-popup.css',
        false,
        filemtime(get_template_directory() . '/assets/css/magnific-popup.css'),
        false
    );
    wp_enqueue_style(
        'spiny-css-style',
        get_stylesheet_directory_uri() . '/style.css',
        false,
        filemtime(get_stylesheet_directory() . '/style.css'),
        false
    );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script(
        'spiny-js-owl',
        get_template_directory_uri() . '/assets/js/owl.carousel.min.js',
        array('jquery'),
        filemtime(get_template_directory() . '/assets/js/owl.carousel.min.js'),
        true
    );
    wp_enqueue_script(
        'spiny-js-magnific-popup',
        get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js',
        array('jquery'),
        filemtime(get_template_directory() . '/assets/js/jquery.magnific-popup.min.js'),
        true
    );
    wp_enqueue_script(
        'spiny-js-fns',
        get_template_directory_uri() . '/assets/js/fns.js',
        array('jquery'),
        filemtime(get_template_directory() . '/assets/js/fns.js'),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'wp_robots_scripts' );