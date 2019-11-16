<?php
$option_action = admin_url( 'themes.php?page=theme-options&tab=general' );
?>
<div class="layout">
    <form action="<?php echo $option_action; ?>" class="ajax-form" method="post">
        <?php
        wp_nonce_field( 'settings-page' );
        ?>
        <table class="admin_table">
            <tr>
                <td class="fld">
                    <h4><?php _e('Лого', 'spiny'); ?></h4>
                    <?php
                    $logo_image    = get_option( 'logo_image' );
                    $logo_image_id = get_option( 'logo_image_id' );
                    ?>
                    <div class="spiny_image_block<?php echo (!$logo_image || empty($logo_image) || (int)$logo_image_id < 0) ? ' default' : ''; ?>">
                        <div class="spiny_image_block_close"></div>
                        <?php
                        if( !$logo_image || empty($logo_image) || (int)$logo_image < 0 ) {
                            ?>
                            <img id="logo_image_img" alt="" data-default="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/spiny.svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/spiny.svg">
                            <?php
                        }
                        else {
                            ?>
                            <img id="logo_image_img" alt="" data-default="<?php echo get_stylesheet_directory_uri(); ?>/assets/i/spiny.svg" src="<?php echo esc_url( $logo_image ); ?>">
                            <?php
                        }
                        ?>
                    </div>
                    <input type="hidden" class="image_id" name="logo_image_id" value="<?php echo (int) $logo_image_id; ?>"/>
                    <input type="hidden" id="logo_image" name="logo_image" class="upload" value="<?php echo esc_url( $logo_image ); ?>">
                    <input type="button" class="button upload-button" style="margin-top: 10px; margin-bottom: 10px;" value="Browse">
                </td>
                <td><?php _e('Выберите логотип сайта', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Подпись к логотипу', 'spiny'); ?></h4>
                    <?php
                    $logo_text = get_option( 'blogdescription' );
                    ?>
                    <textarea id="logo_text" name="logo_text" rows="2" cols="50"><?php echo ( wp_strip_all_tags( $logo_text ) ); ?></textarea>
                </td>
                <td><?php _e('Кородкая подпись под логотипом', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Favicon', 'spiny'); ?></h4>
                    <?php
                    $favicon_image    = get_option( 'favicon_image' );
                    $favicon_image_id = get_option( 'favicon_image_id' );
                    ?>
                    <div class="spiny_image_block<?php echo (!$favicon_image || empty($favicon_image) || (int)$favicon_image_id < 0) ? ' default' : ''; ?>">
                        <div class="spiny_image_block_close"></div>
                        <img id="favicon_image_img" alt="" data-default="" src="<?php echo ( (int)$favicon_image_id < 0 ) ? '' : esc_url( $favicon_image ); ?>">
                    </div>
                    <input type="hidden" class="image_id" name="favicon_image_id" value="<?php echo (int) $favicon_image_id; ?>"/>
                    <input type="hidden" id="favicon_image" name="favicon_image" class="upload" style="width: 100%;" value="<?php echo esc_url( $favicon_image ); ?>">
                    <input type="button" class="button upload-button" style="margin-top: 10px; margin-bottom: 10px;" value="Browse"><br/>
                </td>
                <td><?php _e('Image size 96&times;96 pixels', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Footer copyright', 'spiny'); ?></h4>
                    <?php
                    $footer_copyright = get_option( 'footer_copyright' );
                    ?>
                    <textarea id="footer_copyright" name="footer_copyright" rows="2" cols="50"><?php echo ( $footer_copyright ); ?></textarea>
                </td>
                <td><?php _e('Footer copyright string', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <input type="submit" name="submit" class="button button-primary button-large" value="<?php _e('Save Changes', 'spiny'); ?>">
                    <input type="hidden" name="save_options" value="Y">
                </td>
                <td></td>
            </tr>
        </table>
    </form>
</div>