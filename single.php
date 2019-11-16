<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package spiny
 */

get_header();


$spiny_sidebar = get_option( 'spiny_sidebar' );
if( $spiny_sidebar && (int)$spiny_sidebar === 1 ) {
    get_template_part( 'inc/grid/single', 'sidebar' );
}
else {
    get_template_part( 'inc/grid/single', 'nosidebar' );
}


get_footer();
