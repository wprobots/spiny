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
                <td><?php _e('Link to your Facebook page', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Twitter', 'spiny'); ?></h4>
                    <?php
                    $social_twitter = get_option( 'social_twitter' );
                    ?>
                    <input type="text" id="social_twitter" name="social_twitter" style="width: 100%;" value="<?php echo esc_url( $social_twitter ); ?>">
                </td>
                <td><?php _e('Link to your Twitter', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Instagram', 'spiny'); ?></h4>
                    <?php
                    $social_instagram = get_option( 'social_instagram' );
                    ?>
                    <input type="text" id="social_instagram" name="social_instagram" style="width: 100%;" value="<?php echo esc_url( $social_instagram ); ?>">
                </td>
                <td><?php _e('Link to your Instagram', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Google+', 'spiny'); ?></h4>
                    <?php
                    $social_google_plus = get_option( 'social_google_plus' );
                    ?>
                    <input type="text" id="social_google_plus" name="social_google_plus" style="width: 100%;" value="<?php echo esc_url( $social_google_plus ); ?>">
                </td>
                <td><?php _e('Link to your Google+', 'spiny'); ?></td>
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