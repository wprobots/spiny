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
                    <h4><?php _e('Grid', 'spiny'); ?></h4>
                    <?php
                    $spiny_grid = get_option( 'spiny_grid' );
                    if(! $spiny_grid || (int)$spiny_grid < 1 ) {
                        $spiny_grid = 4;
                    }

                    for( $i=0; $i<5; $i++ ) {
                        $spiny_checked = (int)$spiny_grid === ($i+1) ? ' checked="checked"' : '';
                        ?>
                        <div class="radio_line">
                            <input type="radio" name="spiny_grid" id="spiny_grid_<?php echo ($i+1); ?>" value="<?php echo ($i+1); ?>"<?php echo $spiny_checked;?> />
                            <label for="spiny_grid_<?php echo ($i+1); ?>"><?php echo num_decline(($i+1), array('колонка', 'колонки', 'колонок')); ?></label>
                        </div>
                        <?php
                    }
                    ?>
                </td>
                <td><?php _e('Select the grid of the blog', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Show sidebar', 'spiny'); ?></h4>
                    <?php
                    $spiny_sidebar         = get_option( 'spiny_sidebar' );
                    $spiny_sidebar_checked = (int)$spiny_sidebar === 1 ? 'checked="checked"' : '';
                    ?>
                    <input type="checkbox" name="spiny_sidebar" id="spiny_sidebar" value="1" <?php echo $spiny_sidebar_checked;?> />
                    <label for="spiny_sidebar">Показывать сайдбар</label>
                </td>
                <td><?php _e('Check for displaying sidebar', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Related posts', 'spiny'); ?></h4>
                    <?php
                    $related_posts         = get_option( 'related_posts' );
                    $related_posts_checked = (int)$related_posts === 1 ? 'checked="checked"' : '';
                    ?>
                    <input type="checkbox" name="related_posts" id="related_posts" value="1" <?php echo $related_posts_checked;?> />
                    <label for="related_posts">Show related posts</label>
                </td>
                <td><?php _e('Check for displaying related post under a post content', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Favorite posts', 'spiny'); ?></h4>
                    <?php
                    $favorite_posts         = get_option( 'favorite_posts' );
                    $favorite_posts_checked = (int)$favorite_posts === 1 ? 'checked="checked"' : '';
                    ?>
                    <input type="checkbox" name="favorite_posts" id="favorite_posts" value="1" <?php echo $favorite_posts_checked;?> />
                    <label for="favorite_posts">Show favorite posts</label>
                </td>
                <td><?php _e('Check for displaying favorite post at index page', 'spiny'); ?></td>
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