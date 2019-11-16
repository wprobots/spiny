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
                    <h4><?php _e('Tracking Code (/head)', 'spiny'); ?></h4>
                    <?php
                    $tracking_code_header = get_option( 'tracking_code_header' );
                    ?>
                    <textarea id="logo_left_text" name="tracking_code_header" rows="2" cols="50"><?php echo $tracking_code_header ; ?></textarea>
                </td>
                <td></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Tracking Code (/footer)', 'spiny'); ?></h4>
                    <?php
                    $tracking_code_footer = get_option( 'tracking_code_footer' );
                    ?>
                    <textarea id="logo_left_text" name="tracking_code_footer" rows="2" cols="50"><?php echo $tracking_code_footer ; ?></textarea>
                </td>
                <td></td>
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