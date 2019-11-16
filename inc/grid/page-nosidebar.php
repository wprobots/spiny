<?php
$cols = spiny_columns();
?>

<div class="reducer">

    <div class="spiny_grid_container">
        <div class="spiny_grid">
            <div class="spiny_grid__col6">
                <?php
                if( have_posts() ) {
                    while ( have_posts() ) :
                        the_post();

                        ?>
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
                            $post_image = get_the_post_thumbnail( $post->ID, 'large' );

                            if( $post_image ) {
                                echo wpautop($post_image);
                            }

                            the_content();

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            ?>
                        </article>
                    <?php
                    endwhile; // End of the loop.
                }
                else {
                    ?>
                    <div class="spiny_grid__col6">
                        Пусто
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>



</div>