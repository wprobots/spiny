<?php

?>
</section>
</div>
<div class="page_footer">
    <footer>
        <div class="reducer">
            <div class="spiny_grid_container">
                <div class="spiny_grid vertical_center">
                    <div class="spiny_grid__col6">
                        <nav class="spiny_footer_nav">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu' => 'footer',
                                'container' => false,
                                'menu_class' => 'spiny_footer_nav_list',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                            ));
                            ?>
                        </nav>

                        <?php
                        $social_facebook = get_option('social_facebook');
                        $social_twitter = get_option('social_twitter');
                        $social_instagram = get_option('social_instagram');
                        $social_vkontakte = get_option('social_vkontakte');
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

                        <?php
                        $footer_copyright = get_option('footer_copyright');
                        if ($footer_copyright && trim($footer_copyright) !== '') {
                            ?>
                            <div class="copy">
                                <?php echo $footer_copyright; ?>
                            </div>
                            <?php
                        }
                        else {
                            ?>
                            <div class="copy">
                                &copy; 2019 <a href="https://spiny.wp-robots.org/zero/">wp-robots</a> themes
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
<div class="up"></div>

<div class="fade" style="display: none;"></div>
<div class="popup" style="display: none;">
    <div class="popup_bg">
        <div class="popup_close"></div>
        <div class="popup_txt">

        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
