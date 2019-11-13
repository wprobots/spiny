<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Jura:400,700&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <?php wp_head(); ?>

</head>
<body>
<?php
/* GLOBAL SETTINGS FIELDS */
$wrs_site_header_logo = get_field('wrs_site_header_logo', 'options');
$wrs_site_header_logo_w = get_field('wrs_site_header_logo_mobile', 'options');
$wrs_site_header_logo_text = get_field('wrs_site_header_logo_text', 'options');
$wrs_site_favicon     = get_field('wrs_site_favicon', 'options');
$wrs_social           = get_field('wrs_social', 'option');
$wrs_site_scripts     = get_field('wrs_site_scripts', 'option');
/* GLOBAL SETTINGS FIELDS */

if($wrs_site_scripts) {
    echo $wrs_site_scripts;
}
?>
<div class="layout">
    <header<?php echo (is_front_page()) ? ' class="front-page"' : ''; ?>>
        <div class="header_fixed_container">
            <div class="header_fixed<?php echo is_user_logged_in() ? ' top32' : ''; ?>">
                <div class="reducer">
                    <div class="mdl-grid mt10" style="align-items: center;">
                        <div class="mdl-cell mdl-cell--4-col header-col1">
                            <div class="mobile_menu fll"></div>
                            <a href="/search/" class="fll mdl-button mdl-js-button mdl-button--icon search_btn_full"><i class="material-icons">search</i></a>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col header-col2">
                            <div class="ovh">
                                <div class="tac">
                                    <?php
                                    if( $wrs_site_header_logo ) {
                                        ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                                            <img src="<?php echo $wrs_site_header_logo['url']; ?>" width="190" height="auto">
                                        </a>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><?php echo $wrs_site_header_logo_text; ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col header-col3 tar">
                            <a href="/search/" class="flr mdl-button mdl-js-button mdl-button--icon search_btn_mobile"><i class="material-icons">search</i></a>
                            <?php
                            $wrs_social = get_field('wrs_social', 'options');
                            foreach($wrs_social as $soc) {
                                $soc_title = $soc['wrs_social_name'];
                                $soc_link = $soc['wrs_social_url'];
                                $soc_icon = $soc['wrs_social_icon'];

                                if( $soc_icon ) {
                                    echo '<a href="' . $soc_link . '" title="' . $soc_title . '" target="_blank" class="header_icon" style="background: url(\'' . $soc_icon['url'] . '\') 50% 50% no-repeat; -webkit-background-size: cover;background-size: cover;"></a>';
                                }
                                else {
                                    echo '<a href="' . $soc_link . '" target="_blank">' . $soc_title . '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- div class="black_border"></div -->
        <div class="reducer">
            <div class="mdl-grid nav_grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="tac">
                        <nav>
                            <div class="main_nav_container">
                                <div class="mobile_menu_container">
                                    <div class="mobile_menu_top">
                                        <a href="/" class="bdn"><img src="<?php echo $wrs_site_header_logo['url']; ?>" width="190" height="auto"></a>
                                    </div>
                                    <?php
                                    $additional_menu_li = '';

                                    if( $wrs_social ) {
                                        $soc_icon = false;
                                        foreach($wrs_social as $soc) {
                                            $soc_icon = $soc['wrs_social_icon'];
                                            if($soc_icon) {
                                                $soc_icon = true;
                                                break;
                                            }
                                        }
                                        $soc_icon_str = '';
                                        foreach($wrs_social as $soc) {
                                            $soc_icon = $soc['wrs_social_icon'];
                                            if($soc_icon) {
                                                $soc_icon_str .= '<a href="' . $soc_link . '" title="' . $soc_title . '" target="_blank" class="header_icon" style="background: url(\'' . $soc_icon['url'] . '\') 50% 50% no-repeat; -webkit-background-size: cover;background-size: cover; display: inline-block; width: 36px; height: 36px; padding: 0; margin-left: 10px; margin-right: 10px;"></a>';
                                            }
                                            else {
                                                $additional_menu_li .= '<li class="mobile_user_menu"><a href="' . $soc['wrs_social_url'] . '">' . $soc['wrs_social_name'] . '</a></li>';
                                            }
                                        }
                                        if( $soc_icon ) {
                                            $additional_menu_li .= '<li class="mobile_user_menu" style="margin: 15px 0;">' . $soc_icon_str . '</li>';
                                        }
                                    }

                                    $additional_menu_li .= '<li class="mobile_user_menu mobile_menu_close"><a href="#" class="mobile_menu_close_icon"></a></li>';
                                    //                                if( ! is_user_logged_in() ) {
                                    ////                                    $additional_menu_li .= '<li class="login_link"><a href="' . get_permalink(43) . '">' . get_the_title(43) . '</a></li>';
                                    ////                                    $additional_menu_li .= '<li class="singnup_link"><a href="' . get_permalink(45) . '">' . get_the_title(45) . '</a></li>';
                                    //                                }
                                    //                                else {
                                    ////                                    $wrs_site_header_logout_link = urldecode(wp_logout_url('/'));
                                    ////                                    $additional_menu_li .= '<li class="top_border mobile_user_menu"><a href="' . get_permalink(48) . '">' . get_the_title(48) . '</a></li>';
                                    ////                                    $additional_menu_li .= '<li class="mobile_user_menu"><a href="' . get_permalink(56) . '">' . get_the_title(56) . '</a></li>';
                                    ////                                    $additional_menu_li .= '<li class="mobile_user_menu"><a href="' . get_permalink(63) . '">' . get_the_title(63) . '</a></li>';
                                    ////                                    $additional_menu_li .= '<li class="mobile_user_menu"><a href="' . get_permalink(65) . '">' . get_the_title(65) . '</a></li>';
                                    ////                                    $additional_menu_li .= '<li class="mobile_user_menu"><a href="' . $wrs_site_header_logout_link . '">Выйти</a></li>';
                                    ////                                    $additional_menu_li .= '<li class="mobile_user_menu"><a href="' . get_permalink(59) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Добавить вакансию</a></li>';
                                    //
                                    //                                }
                                    wp_nav_menu( array(
                                        'theme_location'  => 'primary',
                                        'menu'            => 'main',
                                        'container'       => false,
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'menu_class'      => 'main_nav',
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s' . $additional_menu_li . '</ul>',
                                        'depth'           => 0,
                                        'walker'          => '',
                                    ) );
                                    ?>

                                    <?php
                                    /*
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-1',
                                        'menu_id'        => 'primary-menu',
                                    ) );
                                    */
                                    ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>