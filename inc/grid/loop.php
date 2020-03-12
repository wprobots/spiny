<?php
global $wp_query;
?>

<div class="container">

    <div class="row">
        <div class="column">
            <?php
            if( is_archive() ) {
                ?>
                <div class="row">
                    <div class="column">
                        <?php
                        if( is_category() || is_tag() || is_tax() ) {
                            $current = $wp_query->get_queried_object();
                            $curr_taxonomy = get_taxonomy($current->taxonomy);
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
                                <div>
                                    <?php echo wpautop($author_meta['description'][0]); ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>

            <?php
            if( is_search() ) {
                ?>
                <div class="row">
                    <div class="column">
                        <h1><?php printf( __( 'Результаты поиска по&nbsp;запросу&nbsp;&mdash; "%s"', 'spiny' ), get_search_query() ); ?></h1>

                        <?php
                        get_search_form();
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>

            <?php
            if( have_posts() ) {
                while ( have_posts() ) :
                    the_post();

                    $image = get_the_post_thumbnail( $post->ID, 'large' );
                    ?>
                    <div class="row">
                        <div class="column">

                            <?php
                            if( $image ) {
                                ?>
                                <a href="<?php echo get_permalink($post->ID); ?>">
                                    <?php echo $image; ?>
                                </a>
                                <?php
                            }
                            ?>

                            <p class="post_title"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></p>
                            <?php
                            if( has_excerpt($post->ID) ) {
                                $excerpt = get_the_excerpt( $post->ID );
                            }
                            else {
                                $excerpt = wp_trim_excerpt( '', $post->ID );
                            }

                            echo wpautop($excerpt);
                            ?>
                            <a href="<?php echo get_permalink($post->ID); ?>"><?php echo __( 'Read more', 'spiny' ); ?></a>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>

                <?php
                include_once( __DIR__ . '/../pagination.php' );
            }
            else {
                ?>
                <div class="row">
                    <div class="column">
                        <?php echo __( 'No entries here', 'spiny' ); ?>
                    </div>
                </div>
                <?php

            }
            ?>
        </div>

        <?php
        get_sidebar();
        ?>
    </div>

</div>