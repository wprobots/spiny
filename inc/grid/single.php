<article itemscope itemtype="http://schema.org/Article">
    <h1 itemprop="name"><?php the_title(); ?></h1>
    <div>
        <?php
        $author_id = $post->post_author;
        $date = get_the_date( 'd.m.Y', $post );
        ?>
        <div>
            <a href="<?php echo get_author_posts_url($author_id); ?>" itemprop="author"><?php echo get_the_author($author_id); ?></a>
        </div>
        <div itemprop="datePublished"><?php echo $date; ?></div>
    </div>
    <?php
    $post_image = get_the_post_thumbnail( $post->ID, 'large' );

    if( $post_image ) {
        ?>
        <div itemscope itemtype="http://schema.org/ImageObject">
            <?php
            echo $post_image;
            ?>
        </div>
        <?php
    }
    ?>
    <div itemprope="articleBody">
        <?php
        the_content();
        ?>
    </div>
    <div class="post_category">
        <?php echo __( 'Categories:', 'spiny' ); ?>
        <?php echo get_the_category_list( ', ' ); ?>
    </div>
    <div class="post_tag">
        <?php echo __( 'Tags:', 'spiny' ); ?>
        <?php echo get_the_tag_list( '', ', ', '' ); ?>
    </div>
    <?php

    the_post_navigation();

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?>
</article>