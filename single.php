<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package spiny
 */

get_header();


while ( have_posts() ) :
    the_post();

    ?>
    <div class="reducer">
        <div class="w960">
            <div class="mdl-grid">

                <?php
                $post_view     = (int)get_post_meta( $post->ID, 'post_total_view', true );
                $post_view_new = $post_view + 1;
                //update_post_meta( $post->ID, 'post_total_view', $post_view_new );
                ?>
                <div class="mdl-cell mdl-cell--12-col">
                    <article>
                        <h1><?php the_title(); ?></h1>
                        <div class="ovh mb15">
                            <?php
                            $author_id = $post->post_author;
                            $date = get_the_date( 'd.m.Y', $post );
                            ?>
                            <div class="fll">
                                <a href="<?php echo get_author_posts_url($author_id); ?>" class="mr10"><?php echo get_the_author($author_id); ?></a>
                                <span class="mr10"></span>
                                <span class="icon icon-view"></span>
                                <span class="view" style="font-size: 12px;"><?php echo $post_view_new; ?></span>
                            </div>
                            <div class="flr"><?php echo $date; ?></div>
                        </div>
                        <?php
                        //                $post_image = get_the_post_thumbnail( $post->ID, 'full', array('class' => 'full_width mb15') );
                        //
                        //                if( $post_image ) {
                        //                    echo $post_image;
                        //                }

                        the_content();

                        ?>
                    </article>
                </div>
                <?php
                ?>
            </div>
        </div>
    </div>
    <?php
//    if(  ) {
//
//    }
//    else {
//
//    }

    //the_post_navigation();

    // If comments are open or we have at least one comment, load up the comment template.
//    if ( comments_open() || get_comments_number() ) :
//        comments_template();
//    endif;

endwhile; // End of the loop.


get_footer();
