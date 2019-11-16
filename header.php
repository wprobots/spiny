<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php wp_head(); ?>
    <?php
    if( get_option( 'tracking_code_header' ) ) {
        echo stripslashes_deep( get_option( 'tracking_code_header' ) );
    }
    ?>
</head>
<body <?php body_class(); ?>>
<div class="layout">
    <div class="page_header">
        <header>
            <div class="reducer">
                <div class="spiny_grid_container">
                    <div class="spiny_grid vertical_center">
                        <div class="spiny_grid__col1">
                            <?php
                            $logo_img      = get_option( 'logo_image' );
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
                                        echo $logo_text;
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
                                        echo $logo_text;
                                    }
                                    ?>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="spiny_grid__col2">
                            <nav class="spiny_main_nav">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location'  => 'primary',
                                    'menu'            => 'main',
                                    'container'       => false,
                                    'menu_class'      => 'spiny_main_nav_list',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                ) );
                                ?>
                            </nav>
                        </div>
                        <div class="spiny_grid__col1">222</div>
                    </div>
                </div>


                <div class="mdl-grid mt10" style="align-items: center;">
                    <div class="mdl-cell mdl-cell--4-col header-col1">
                        <div class="mobile_menu fll"></div>
                        <a href="/search/" class="fll mdl-button mdl-js-button mdl-button--icon search_btn_full"><i class="material-icons">search</i></a>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col header-col2">
                        <div class="ovh">
                            <div class="tac">

                            </div>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col header-col3 tar">
                        <a href="/search/" class="flr mdl-button mdl-js-button mdl-button--icon search_btn_mobile"><i class="material-icons">search</i></a>

                    </div>
                </div>
            </div>
            <div class="reducer">
                <div class="mdl-grid nav_grid">
                    <div class="mdl-cell mdl-cell--12-col">
                        <div class="tac">
                            <nav>
                                <div class="main_nav_container">
                                    <div class="mobile_menu_container">
                                        <div class="mobile_menu_top">

                                            <?php
                                            if( !$logo_image || empty($logo_image) || (int)$logo_image_id < 0 ) {
                                                ?>
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                                                    <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/spiny.svg">
                                                </a>
                                                <?php
                                            }
                                            else {
                                                ?>
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                                                    <img alt="" src="<?php echo esc_url( $logo_image ); ?>">
                                                </a>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="page_container">
        <section>