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
<?php
$social_facebook = get_option('social_facebook');
$social_twitter = get_option('social_twitter');
$social_instagram = get_option('social_instagram');
$social_vkontakte = get_option('social_vkontakte');
?>
<div class="layout">
    <div class="page_header">
        <header>
            <div class="header_search_form" style="display: none;">
                <div class="reducer">
                    <?php get_search_form( ); ?>
                </div>
            </div>
            <div class="reducer">
                <div class="spiny_grid_container">
                    <div class="spiny_grid vertical_center header_cols">
                        <div class="spiny_grid__col2 header_col1">
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
                        <div class="spiny_grid__col4 header_col2">
                            <nav class="spiny_main_nav">
                                <div class="spiny_main_nav_mobile_btn"></div>
                                <?php
                                $additional_menu_logo = '<li class="spiny_main_nav_mobile_li">';
                                if( !$logo_image || empty($logo_image) || (int)$logo_image_id < 0 ) {

                                    $additional_menu_logo .= '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo">';
                                    $additional_menu_logo .= '<img alt="" src="' . get_stylesheet_directory_uri() . '/assets/i/wp-robots.svg">';
                                    if( $logo_text && trim($logo_text) !== '' ) {
                                        $additional_menu_logo .= $logo_text;
                                    }
                                    $additional_menu_logo .= '</a>';
                                }
                                else {
                                    $additional_menu_logo .= '<a href="' . esc_url( home_url( '/' ) ) . '" class="logo">';
                                    $additional_menu_logo .= '<img alt="" src="' . esc_url( $logo_image ) . '">';
                                    if( $logo_text && trim($logo_text) !== '' ) {
                                        $additional_menu_logo .= $logo_text;
                                    }
                                    $additional_menu_logo .= '</a>';
                                }
                                $additional_menu_logo .= '</li>';

                                $additional_menu_li = '';
                                if (($social_facebook && trim($social_facebook) !== '') || ($social_twitter && trim($social_twitter) !== '') || ($social_instagram && trim($social_instagram) !== '') || ($social_vkontakte && trim($social_vkontakte) !== '')) {

                                    $additional_menu_li .= '<li class="spiny_main_nav_mobile_li">';
                                    $additional_menu_li .= '<div class="social">';
                                    if ($social_facebook && trim($social_facebook) !== '') {
                                        $additional_menu_li .= '<a href="' . $social_facebook . '" class="social_facebook" target="_blank">Facebook</a>';
                                    }
                                    if ($social_instagram && trim($social_instagram) !== '') {
                                        $additional_menu_li .= '<a href="' . $social_instagram . '" class="social_instagram" target="_blank">Instagram</a>';
                                    }
                                    if ($social_twitter && trim($social_twitter) !== '') {
                                        $additional_menu_li .= '<a href="' . $social_twitter . '" class="social_twitter" target="_blank">Twitter</a>';
                                    }
                                    if ($social_vkontakte && trim($social_vkontakte) !== '') {
                                        $additional_menu_li .= '<a href="' . $social_vkontakte . '" class="social_vkontakte" target="_blank">Вконтакте</a>';
                                    }
                                    $additional_menu_li .= '</div>';
                                    $additional_menu_li .= '</li>';
                                }

                                $additional_menu_li .= '<li class="spiny_main_nav_mobile_li"><div class="spiny_main_nav_mobile_close"></div></li>';

                                wp_nav_menu( array(
                                    'theme_location'  => 'header',
                                    'menu'            => 'header',
                                    'container'       => false,
                                    'menu_class'      => 'spiny_main_nav_list',
                                    'echo'            => true,
                                    'items_wrap'      => '<ul id="%1$s" class="%2$s">' . $additional_menu_logo . '%3$s' . $additional_menu_li . '</ul>',
                                    'fallback_cb'     => 'wp_page_menu',
                                ) );
                                ?>
                            </nav>
                        </div>
                        <div class="spiny_grid__col2 header_col3">
                            <div class="float_left">
                                <?php
                                if (($social_facebook && trim($social_facebook) !== '') || ($social_twitter && trim($social_twitter) !== '') || ($social_instagram && trim($social_instagram) !== '') || ($social_vkontakte && trim($social_vkontakte) !== '')) {
                                    ?>
                                    <div class="social">
                                        <?php
                                        if ($social_facebook && trim($social_facebook) !== '') {
                                            ?>
                                            <a href="<?php echo $social_facebook; ?>" class="social_facebook" target="_blank">Facebook</a>
                                            <?php
                                        }
                                        if ($social_instagram && trim($social_instagram) !== '') {
                                            ?>
                                            <a href="<?php echo $social_instagram; ?>" class="social_instagram" target="_blank">Instagram</a>
                                            <?php
                                        }
                                        if ($social_twitter && trim($social_twitter) !== '') {
                                            ?>
                                            <a href="<?php echo $social_twitter; ?>" class="social_twitter" target="_blank">Twitter</a>
                                            <?php
                                        }
                                        if ($social_vkontakte && trim($social_vkontakte) !== '') {
                                            ?>
                                            <a href="<?php echo $social_vkontakte; ?>" class="social_vkontakte" target="_blank">Вконтакте</a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="float_right">
                                <a href="/?s=" class="search_link">Поиск</a>
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
            if( ! is_front_page() && function_exists('kama_breadcrumbs') ) {
                ?>
                <div class="reducer">
                    <?php
                    kama_breadcrumbs(
                    ' >',
                        array(
                            'home'       => 'Главная',
                            'paged'      => 'Страница %d',
                            '_404'       => 'Ошибка 404',
                            'search'     => 'Результаты поиска по запросу - <b>%s</b>',
                            'author'     => '%s',
                            'year'       => 'Архив за <b>%d</b> год',
                            'month'      => 'Архив за: <b>%s</b>',
                            'day'        => '',
                            'attachment' => 'Медиа: %s',
                            'tag'        => '<b>%s</b>',
                            'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
                            // tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
                            // Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
                        ),
                        array('mark' => 'schema.org')
                    );
                    ?>
                </div>
                <?php
            }