<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package spiny
 */

get_header();

$wrs_cta_read_button_title = get_field('wrs_cta_read_button_title', 'options');
$empty_img = get_empty_image();

$frontpage_id = get_option( 'page_on_front' );

?>

    <div class="reducer">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">

                <h1 class="page-title">
                    <?php
                    /* translators: %s: search query. */
                    printf( 'Результаты поиска для "%s"', get_search_query() );
                    ?>
                </h1>

                <?php
                get_search_form();
                ?>
            </div>

            <?php
            ?>
            <div class="mdl-cell mdl-cell--12-col ml0 mr0">
                <div class="mdl-grid pt0 pl0 pr0">
                    <?php
                    if( have_posts() ) {
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post();

                            $post_img = get_the_post_thumbnail($post->ID, 'medium_additional');
                            if( trim($post_img) === '' ) {
                                $post_img = $empty_img;
                            }

                            ?>
                            <div class="mdl-cell mdl-cell--3-col">
                                <a href="<?php echo get_permalink($post->ID); ?>" class="bdn">
                                    <?php echo $post_img; ?>
                                </a>
                                <h4><a href="<?php echo get_permalink($post->ID); ?>" class="bdn"><?php echo get_the_title($post); ?></a></h4>
                            </div>
                        <?php

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            //get_template_part( 'template-parts/content', get_post_type() );

                        endwhile;
                    }
                    else {
                        ?>
                        <div class="mdl-cell mdl-cell--12-col">
                            <p>Нажаль, записів немає</p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php


            include_once( __DIR__ . '/inc/archive-pagination.php' );

            ?>
        </div>
        <?php

        ?>
    </div>

<?php
get_footer();
