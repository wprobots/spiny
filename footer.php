</section>
</div>
<div class="page_footer">
    <footer>
        <div class="container">
            <div class="row">
                <div class="column">
                    <nav class="spiny_footer_nav">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu' => 'footer',
                            'container' => false,
                            'menu_class' => 'spiny_footer_nav_list',
                            'echo' => true,
                        ));
                        ?>
                    </nav>

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
                            &copy; 2019 - <?php echo date('Y'); ?> <a href="https://spiny.io/">Spiny themes</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
