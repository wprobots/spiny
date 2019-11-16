<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'admin_enqueue_scripts', 'spiny_admin_assets' );
function spiny_admin_assets(){
    wp_enqueue_media();

    // делаем что нужно...
    wp_enqueue_style(
        'spiny-css-admin',
        get_stylesheet_directory_uri() . '/assets/css/admin.css',
        false,
        filemtime(get_stylesheet_directory() . '/assets/css/admin.css'),
        false
    );

    wp_enqueue_script(
        'spiny-js-admin',
        get_template_directory_uri() . '/assets/js/admin.js',
        array(),
        filemtime(get_template_directory() . '/assets/js/admin.js'),
        true
    );

}

function spiny_options_tabs( $current = 'general' ) {
    $tabs = array(
        'general' => __('Общие настройки', 'spiny'),
        'grid'    => __('Сетка сайта', 'spiny'),
        'scripts'     => __('Подключение скриптов', 'spiny'),
        'social'  => __('Соц. сети', 'spiny'),
    );

    foreach( $tabs as $key => $val ) {
        $class_name = ( $key == $current ) ? 'curr' : '';
        ?>
        <div class="gf_tab <?php echo $class_name; ?>"><a href="<?php echo admin_url( 'themes.php?page=theme-options&tab=' . $key ); ?>"><?php echo $val; ?></a></div>
        <?php
    }

    /*
    ?>
    <div class="gf_tab"><a href="<?php echo admin_url( 'customize.php' ); ?>"><?php _e('Colors', 'spiny'); ?></a></div>
    <?php
    */
}

function spiny_options_page() {
    $default = 'general';
    $tab     = ( isset($_GET['tab']) ) ? trim($_GET['tab']) : $default;

    get_template_part( 'inc/admin/options-tab', $tab );
}

function spiny_options() {
    ?>
    <div class="status" style="display: none;">
        <div class="status_txt">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/i/loader.gif" alt=""/> <strong>Saving...</strong>
        </div>
    </div>
    <div class="wrap">
        <h1 style="margin-bottom: 10px;"><?php _e('Настройки темы', 'spiny'); ?></h1>
        <div class="gf_tabs">
            <?php
            $current_tab = ( isset($_GET['tab']) ) ? trim($_GET['tab']) : 'general';
            spiny_options_tabs( $current_tab );
            ?>
        </div>
        <?php
        spiny_options_page();
        ?>
    </div>
    <?php
}

function spiny_options_save() {
    global $pagenow;
    if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' ) {
        if ( isset ( $_GET['tab'] ) ) {
            $tab = $_GET['tab'];
        }
        else {
            $tab = 'general';
        }

        if($tab == 'general') {
            update_option( 'logo_image', $_POST['logo_image'] );
            update_option( 'logo_image_id', (int)$_POST['logo_image_id'] );
            update_option( 'blogdescription', nl2br($_POST['logo_text']) );
            update_option( 'favicon_image', $_POST['favicon_image'] );
            update_option( 'favicon_image_id', (int)$_POST['favicon_image_id'] );
            update_option( 'footer_copyright', $_POST['footer_copyright'] );
        }
        elseif($tab == 'blog') {
            $blog_grid = isset( $_POST['blog_grid'] ) && (int)$_POST['blog_grid'] > 0 ? (int)$_POST['blog_grid'] : 1;
            $blog_sidebar = isset( $_POST['blog_sidebar'] ) && (int)$_POST['blog_sidebar'] > 0 ? (int)$_POST['blog_sidebar'] : 0;
            $related_posts = isset( $_POST['related_posts'] ) && (int)$_POST['related_posts'] > 0 ? (int)$_POST['related_posts'] : 0;
            $favorite_posts = isset( $_POST['favorite_posts'] ) && (int)$_POST['favorite_posts'] > 0 ? (int)$_POST['favorite_posts'] : 0;
            update_option( 'blog_grid', $blog_grid );
            update_option( 'blog_sidebar', $blog_sidebar );
            update_option( 'related_posts', $related_posts );
            update_option( 'favorite_posts', $favorite_posts );
        }
        elseif($tab == 'seo') {
            update_option( 'tracking_code_header', $_POST['tracking_code_header'] );
            update_option( 'tracking_code_footer', $_POST['tracking_code_footer'] );
        }
        elseif($tab == 'social') {
            update_option( 'social_facebook', $_POST['social_facebook'] );
            update_option( 'social_twitter', $_POST['social_twitter'] );
            update_option( 'social_instagram', $_POST['social_instagram'] );
            update_option( 'social_google_plus', $_POST['social_google_plus'] );
        }
    }
}

function spiny_options_update() {
    if ( isset( $_POST["save_options"] ) == 'Y' ) {
        check_admin_referer( "settings-page" );
        spiny_options_save();
        $url_parameters = isset( $_GET['tab'] ) ? 'tab=' . $_GET['tab'] . '&saved=true' : 'saved=true';
        wp_redirect( admin_url( 'themes.php?page=theme-options&' . $url_parameters ) );
        exit;
    }
}

function spiny_options_menu() {
    $settings_page = add_theme_page(
        __('Theme Options', 'spiny'),
        __('Theme Options', 'spiny'),
        'edit_theme_options',
        'theme-options',
        'spiny_options'
    );

    add_action( "load-{$settings_page}", 'spiny_options_update' );
}

add_action( 'admin_menu', 'spiny_options_menu' );