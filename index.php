<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spiny
 */

get_header();

$spiny_sidebar = get_option( 'spiny_sidebar' );
if( $spiny_sidebar && (int)$spiny_sidebar === 1 ) {
    get_template_part( 'inc/grid/loop', 'sidebar' );
}
else {
    get_template_part( 'inc/grid/loop', 'nosidebar' );
}

get_footer();
