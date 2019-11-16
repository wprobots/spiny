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
                    $blog_grid = get_option( 'blog_grid' );
                    $blog_checked_1 = (int)$blog_grid === 1 ? 'checked="checked"' : '';
                    $blog_checked_2 = (int)$blog_grid === 2 ? 'checked="checked"' : '';
                    $blog_checked_3 = (int)$blog_grid === 3 ? 'checked="checked"' : '';
                    ?>
                    <div class="radio_line">
                        <input type="radio" name="blog_grid" id="blog_grid_1" value="1" <?php echo $blog_checked_1;?> />
                        <label for="blog_grid_1">1 column</label>
                    </div>
                    <div class="radio_line">
                        <input type="radio" name="blog_grid" id="blog_grid_2" value="2" <?php echo $blog_checked_2;?> />
                        <label for="blog_grid_2">2 columns</label>
                    </div>
                    <div class="radio_line">
                        <input type="radio" name="blog_grid" id="blog_grid_3" value="3" <?php echo $blog_checked_3;?> />
                        <label for="blog_grid_3">3 columns</label>
                    </div>
                </td>
                <td><?php _e('Select the grid of the blog', 'spiny'); ?></td>
            </tr>
            <tr>
                <td class="fld">
                    <h4><?php _e('Show sidebar', 'spiny'); ?></h4>
                    <?php
                    $blog_sidebar         = get_option( 'blog_sidebar' );
                    $blog_sidebar_checked = (int)$blog_sidebar === 1 ? 'checked="checked"' : '';
                    ?>
                    <input type="checkbox" name="blog_sidebar" id="blog_sidebar" value="1" <?php echo $blog_sidebar_checked;?> />
                    <label for="blog_sidebar">Show site sidebar</label>
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