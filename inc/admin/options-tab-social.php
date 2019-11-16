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
                    <h4><?php _e('Facebook', 'spiny'); ?></h4>
                    <?php
                    $social_facebook = get_option( 'social_facebook' );
                    ?>
                    <input type="text" id="social_facebook" name="social_facebook" style="width: 100%;" value="<?php echo esc_url( $social_facebook ); ?>">
                </td>
                <td><?php _e('Ссылка на Facebook page', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Instagram', 'spiny'); ?></h4>
                    <?php
                    $social_instagram = get_option( 'social_instagram' );
                    ?>
                    <input type="text" id="social_instagram" name="social_instagram" style="width: 100%;" value="<?php echo esc_url( $social_instagram ); ?>">
                </td>
                <td><?php _e('Ссылка на Instagram', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Twitter', 'spiny'); ?></h4>
                    <?php
                    $social_twitter = get_option( 'social_twitter' );
                    ?>
                    <input type="text" id="social_twitter" name="social_twitter" style="width: 100%;" value="<?php echo esc_url( $social_twitter ); ?>">
                </td>
                <td><?php _e('Ссылка на Twitter', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Вконтакте', 'spiny'); ?></h4>
                    <?php
                    $social_vkontakte = get_option( 'social_vkontakte' );
                    ?>
                    <input type="text" id="social_vkontakte" name="social_vkontakte" style="width: 100%;" value="<?php echo esc_url( $social_vkontakte ); ?>">
                </td>
                <td><?php _e('Ссылка на Вконтакте', 'spiny'); ?></td>
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