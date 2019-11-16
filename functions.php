<?php

include_once( __DIR__ . '/inc/lib/utils.php' );

include_once( __DIR__ . '/inc/lib/default.php' );

include_once( __DIR__ . '/inc/lib/styles.php' );

//include_once( __DIR__ . '/inc/lib/svg.php' );
//
//include_once( __DIR__ . '/inc/lib/gallery.php' );
//
//include_once( __DIR__ . '/inc/ajax.php' );


/* INCLUDES FOR WP-ADMIN */

include_once( __DIR__ . '/inc/admin/options.php' );

/* INCLUDES FOR WP-ADMIN */


/* SITE MODULES */

include_once( __DIR__ . '/inc/modules/module.php' );

/* SITE MODULES */


/* OUTER MODULES */

include_once( __DIR__ . '/inc/outer_modules/kama_breadcrumbs.php' );

/* OUTER MODULES */



if( ! function_exists('get_field') ) {
    function get_field() {
        return '';
    }
}







