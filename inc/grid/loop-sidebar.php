<?php
$cols = spiny_columns();
?>

<div class="reducer">

    <div class="spiny_grid_container">
        <div class="spiny_grid">
            <?php
            if( is_archive() ) {
                ?>
                <div class="spiny_grid__col6">
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
            }
            ?>

            <?php
            if( is_search() ) {
                ?>
                <div class="spiny_grid__col6">
                    <h1><?php printf( 'Результаты поиска по&nbsp;запросу&nbsp;&mdash; "%s"', get_search_query() ); ?></h1>

                    <?php
                    get_search_form();
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="spiny_grid__col5">
                <div class="spiny_grid_container">
                    <div class="spiny_grid">
                        <?php
                        if( have_posts() ) {
                            while ( have_posts() ) :
                                the_post();

                                $image = get_the_post_thumbnail( $post->ID, 'medium' );
                                ?>
                                <div class="spiny_grid__col<?php echo $cols; ?>">

                                    <?php
                                    if( $image ) {
                                        ?>
                                        <a href="<?php echo get_permalink($post->ID); ?>" class="fll mr10 dark_hover bdn">
                                            <?php echo $image; ?>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                    <p><a href="<?php echo get_permalink($pst->ID); ?>"><?php echo get_the_title($post->ID); ?></a></p>
                                    <p class="gray_text"><?php echo get_first_paragraph($pst, 13, true, true); ?></p>
                                    <a href="<?php echo get_permalink($post->ID); ?>" class="blue_link"><?php echo $wrs_cta_read_button_title; ?></a>
                                </div>
                            <?php
                            endwhile;
                            ?>

                            <?php
                            include_once( __DIR__ . '/../pagination.php' );
                        }
                        else {
                            ?>
                            <div class="spiny_grid__col6">
                                Записей нет
                            </div>
                            <?php

                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="spiny_grid__col2">
                <?php
                dynamic_sidebar('spiny-sidebar');
                ?>
            </div>
        </div>
    </div>

</div>