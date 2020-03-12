<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="layout">
    <div class="page_header">
        <header>
            <div class="header_search_form" style="display: none;">
                <div class="container">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <div class="container">
                <div class="row header_cols">
                    <div class="column header_col1">
                        <?php
                        $logo_image    = get_option( 'logo_image' );
                        $logo_image_id = get_option( 'logo_image_id' );

                        $logo_text = get_option('blogdescription');
                        ?>

                        <?php
                        if( !$logo_image || empty($logo_image) || (int)$logo_image_id < 0 ) {
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                                <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/wp-robots.svg">
                                <?php
                                if( $logo_text && trim($logo_text) !== '' ) {
                                    echo ' <br>' . $logo_text;
                                }
                                ?>
                            </a>
                            <?php
                        }
                        else {
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                                <img alt="" src="<?php echo esc_url( $logo_image ); ?>">
                                <?php
                                if( $logo_text && trim($logo_text) !== '' ) {
                                    echo ' <br>' . $logo_text;
                                }
                                ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="column header_col2">
                        <nav class="spiny_main_nav">
                            <div class="spiny_main_nav_mobile_btn"></div>
                            <?php
                            wp_nav_menu( array(
                                'theme_location'  => 'header',
                                'menu'            => 'header',
                                'container'       => false,
                                'menu_class'      => 'spiny_main_nav_list',
                                'echo'            => true,
                            ) );
                            ?>
                        </nav>
                    </div>
                    <div class="column header_col3">
                        <div class="clearfix">
                            <div class="float-right">
                                <a href="/?s=" class="search_link"><?php echo __('Search', 'spiny'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="page_container">
        <section>
            <?php
            if( ! is_front_page() ) {
                // TODO. Breadcrumbs
            }