<article>
    <h1><?php the_title(); ?></h1>
    <div>
        <?php
        $author_id = $post->post_author;
        $date = get_the_date( 'd.m.Y', $post );
        ?>
        <div>
            <a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo get_the_author($author_id); ?></a>
            <span></span>
            <span class="icon icon-view"></span>
        </div>
        <div><?php echo $date; ?></div>
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