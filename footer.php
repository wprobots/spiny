<?php

?>
    </section>
</div>
<div class="page_footer">
    <footer>
        <div class="reducer">
            <div class="mdl-grid">
                <?php

                if($wrs_social) {
                    $additional = '';
                    ?>
                    <div class="mdl-cell mdl-cell--12-col">
                        <?php
                        foreach($wrs_social as $soc) {
                            $soc_title = $soc['wrs_social_name'];
                            $soc_link = $soc['wrs_social_url'];
                            $soc_icon = $soc['wrs_social_icon'];

                            if( $soc_icon ) {
                                $additional .= '<li><a href="' . $soc_link . '" title="' . $soc_title . '" target="_blank" class="footer_icon" style="background: url(\'' . $soc_icon['url'] . '\') 50% 50% no-repeat; -webkit-background-size: cover;background-size: cover;"></a></li>';
                            }
                            else {
                                $additional .= '<li><a href="' . $soc_link . '" target="_blank">' . $soc_title . '</a></li>';
                            }
                        }


                        include_once __DIR__ . '/inc/footer-menu.php';
                        wp_nav_menu( array(
                            'theme_location'  => 'footer',
                            'menu'            => 'footer',
                            'container'       => false,
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'footer_nav',
                            'menu_id'         => '',
                            'echo'            => true,
                            'depth'           => 0,
                            'walker'          => $walker,
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s' . $additional . '</ul>',
                        ) );
                        ?>

                    </div>
                    <?php
                }

                ?>
                <div class="mdl-cell mdl-cell--12-col tac">
                    <?php
                    if( $wrs_site_footer_text ) {
                        ?>
                        <p class="mb0s"><?php echo $wrs_site_footer_text; ?></p>
                        <?php
                    }
                    ?>
                </div>
                <?php
                /*
                 * <div class="mdl-cell--12-col tac">
                    <a href="https://spiny.com/" target="_blank" class="bdn" style="display: inline-block;vertical-align: top; padding-bottom: 10px;">
                        <div style="font-size: 12px; color: #ffffff;">Made by</div>
                        <img src="<?php echo get_template_directory_uri() . '/i/spiny.svg'; ?>" style="width: 180px; height: 30px; object-fit: contain; opacity: .3;" class="no_hover" alt="">
                    </a>
                </div>
                 */
                ?>

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
            <?php
            $wrs_mailchimp_form = get_field('wrs_mailchimp_form', 'options');

            if( $wrs_mailchimp_form !== null ) {
                ?>
                <div class="subscribe">
                    <?php echo $wrs_mailchimp_form; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
