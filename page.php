<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spiny
 */

get_header();
?>

    <div class="reducer">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <?php echo breadcrumbs(); ?>
                <?php
                while ( have_posts() ) :
                    the_post();

                    ?>
                    <h1><?php the_title(); ?></h1>
                    <?php
                    $post_image = get_the_post_thumbnail_url( $post, 'full' );
                    if( $post_image ) {
                        ?>
                        <img src="<?php echo $post_image; ?>" alt="<?php the_title(); ?>" class="full_width">
                        <?php
                    }

                    the_content();
                    ?>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>

<?php
get_footer();
