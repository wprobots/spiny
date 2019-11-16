<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

            <?php
            if( is_category() || is_tag() || is_tax() ) {
                $current = $wp_query->get_queried_object();
                $curr_taxonomy = get_taxonomy($current->taxonomy);
                //print_r($current);
//                print_r($curr_taxonomy);
                ?>
                <h1><?php echo $current->name; ?></h1>
                <?php

                if( ! empty($curr_taxonomy->description) ) {
                    echo wpautop($curr_taxonomy->description);
                }
            }
            elseif( is_post_type_archive() ) {
                $current = $wp_query->get_queried_object();

                ?>
                <h1><?php echo $current->label ?></h1>
                <?php
                if( is_post_type_archive() ) {

                    $post_type_description = cpt_description($wp_query->query['post_type']);
                    if( ! empty($post_type_description) ) {
                        echo wpautop($post_type_description);
                    }

                }
            }
            elseif( is_author() ) {
                $current = $wp_query->get_queried_object();

                $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
                $author_meta = get_user_meta($author->ID);

                ?>
                <h1><?php echo $current->data->display_name ?></h1>
                <?php

                if( ! empty($author_meta['description'][0]) ) {
                    ?>
                    <div class="half_width mt10">
                        <?php echo wpautop($author_meta['description'][0]); ?>
                    </div>
                    <?php
                }
            }
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
