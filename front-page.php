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
 * @package tailga
 */

get_header();

$empty_img = get_empty_image();

/* SLIDER */
//include_once( __DIR__ . '/inc/blocks/slider.php' );
/* SLIDER */


?>

<?php
$wrs_featured = get_field('wrs_featured');
if( $wrs_featured ) {
    $top_post_img = get_the_post_thumbnail($wrs_featured[0]['wrs_featured_item']->ID, 'full', array('class' => 'no_hover'));
    if( trim($top_post_img) === '' ) {
        $top_post_img = $empty_img;
    }

    $category = get_the_category($wrs_featured[0]['wrs_featured_item']->ID);
    $category_str = '';
    if( is_array($category) && count($category)> 0 ) {
        $category_str = '<a href="' . get_category_link($category[0]->term_id) . '" class="bdn">' . $category[0]->name . '</a>';
    }

    ?>
    <div class="reducer mb20">
        <div class="mdl-grid" style="align-items: flex-end;">
            <div class="mdl-cell mdl-cell--6-col">
                <a href="<?php echo get_permalink($wrs_featured[0]['wrs_featured_item']->ID); ?>" class="bdn"><?php echo $top_post_img; ?></a>
            </div>
            <div class="mdl-cell mdl-cell--6-col">
                <?php echo $category_str; ?>
                <h1 class="mt10"><a href="<?php echo get_permalink($wrs_featured[0]['wrs_featured_item']->ID); ?>" class="bdn"><?php echo get_the_title($wrs_featured[0]['wrs_featured_item']->ID); ?></a></h1>
                <?php
                echo get_first_paragraph($wrs_featured[0]['wrs_featured_item']->ID, 20, null, true);
                ?>
                <a href="<?php echo get_permalink($wrs_featured[0]['wrs_featured_item']->ID); ?>" class="blue_link">Дізнатись більше</a>
            </div>
        </div>
    </div>
    <?php

    ?>
    <div class="reducer mb20">
        <div class="mdl-grid">
            <?php
            for($i=1; $i<count($wrs_featured); $i++) {
                $post_line = $wrs_featured[$i]['wrs_featured_item'];
                $post_line_img = get_the_post_thumbnail($post_line->ID, 'medium_additional');
                if( trim($post_line_img) === '' ) {
                    $post_line_img = $empty_img;
                }

                $category = get_the_category($post_line->ID);
                $category_str = '';
                if( is_array($category) && count($category)> 0 ) {
                    $category_str = '<p class="mb5 mt5"><a href="' . get_category_link($category[0]->term_id) . '" class="bdn">' . $category[0]->name . '</a></p>';
                }
                ?>
                <div class="mdl-cell mdl-cell--3-col">
                    <a href="<?php echo get_permalink($post_line->ID); ?>" class="bdn">
                        <?php echo $post_line_img; ?>
                    </a>
                    <?php echo $category_str; ?>
                    <h4 class="mt0"><a href="<?php echo get_permalink($post_line->ID); ?>" class="bdn"><?php echo get_the_title($post_line); ?></a></h4>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}

?>

<?php
$posts_line = get_posts( array(
    'numberposts' => 3,
    'offset'      => 0,
    'category'    => 0,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'include'     => array(),
    'exclude'     => array(),
    'meta_key'    => '',
    'meta_value'  =>'',
    'post_type'   => 'post',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
if( is_array($posts_line) && count($posts_line) > 0 ) {
    ?>
    <div class="reducer mb20">
        <div class="mdl-grid">
            <?php
            foreach($posts_line as $post_line) {
                $post_line_img = get_the_post_thumbnail($post_line->ID, 'medium_additional');
                if( trim($post_line_img) === '' ) {
                    $post_line_img = $empty_img;
                }

                $category = get_the_category($post_line->ID);
                $category_str = '';
                if( is_array($category) && count($category)> 0 ) {
                    $category_str = '<p class="mb5 mt5"><a href="' . get_category_link($category[0]->term_id) . '" class="bdn">' . $category[0]->name . '</a></p>';
                }
                ?>
                <div class="mdl-cell mdl-cell--4-col">
                    <a href="<?php echo get_permalink($post_line->ID); ?>" class="bdn">
                        <?php echo $post_line_img; ?>
                    </a>
                    <?php echo $category_str; ?>
                    <h4 class="mt0"><a href="<?php echo get_permalink($post_line->ID); ?>" class="bdn"><?php echo get_the_title($post_line); ?></a></h4>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?>

<?php
$wrs_home_cat = get_field('wrs_home_cat', 'options');
if( $wrs_home_cat ) {
    foreach( $wrs_home_cat as $home_cat ) {
        $cat = get_category( (int) $home_cat['wrs_home_cat_item'] );

        $posts = get_posts( array(
            'numberposts' => 8,
            'category'    => (int) $home_cat['wrs_home_cat_item'],
            'orderby'     => 'date',
            'order'       => 'DESC',
            'include'     => array(),
            'exclude'     => array(),
            'meta_key'    => '',
            'meta_value'  =>'',
            'post_type'   => 'post',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );

        if( is_array($posts) && count($posts) > 0 ) {
            ?>
            <div class="reducer mb20">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--12-col tac">
                        <h2 class="ttu"><?php echo $cat->name; ?></h2>
                    </div>
                    <?php

                    foreach($posts as $pst) {
                        $post_image = get_the_post_thumbnail($pst->ID, 'medium_additional');
                        if( trim($post_image) === '' ) {
                            $post_image = $empty_img;
                        }
                        ?>
                        <div class="mdl-cell mdl-cell--3-col">
                            <a href="<?php echo get_permalink($pst->ID); ?>" class="bdn">
                                <?php echo $post_image; ?>
                            </a>
                            <h4><a href="<?php echo get_permalink($pst->ID); ?>" class="bdn"><?php echo get_the_title($pst); ?></a></h4>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
}
?>


<?php
/*
$wrs_home_project_title = get_field('wrs_home_project_title', 'options');
$wrs_home_project_desc = get_field('wrs_home_project_desc', 'options');
$wrs_home_project_img = get_field('wrs_home_project_img', 'options');
if( $wrs_home_project_title && $wrs_home_project_desc ) {
    ?>
    <div class="reducer mb20">
        <div class="mdl-grid" style="">
            <?php
            if( $wrs_home_project_img ) {
                ?>
                <div class="mdl-cell mdl-cell--6-col">
                    <h2><?php echo $wrs_home_project_title; ?></h2>
                    <?php echo wpautop($wrs_home_project_desc); ?>
                </div>
                <div class="mdl-cell mdl-cell--6-col">
                    <?php
                    $srcset = array();
                    $srcset[] = $wrs_home_project_img['sizes']['thumbnail'] . ' ' . $wrs_home_project_img['sizes']['thumbnail-width'] . 'w';
                    $srcset[] = $wrs_home_project_img['sizes']['medium'] . ' ' . $wrs_home_project_img['sizes']['medium-width'] . 'w';
                    $srcset[] = $wrs_home_project_img['sizes']['large'] . ' ' . $wrs_home_project_img['sizes']['large-width'] . 'w';
                    ?>
                    <img src="<?php echo $wrs_home_project_img['url']; ?>" alt="<?php echo $wrs_home_project_title; ?> <?php echo $wrs_home_project_desc; ?>" srcset="<?php echo implode(',', $srcset); ?>" sizes="(max-width: <?php echo $wrs_home_project_img['width']; ?>px) 100vw, <?php echo $wrs_home_project_img['width']; ?>px">
                    <?php
                    ?>
                </div>
                <?php
            }
            else {
                ?>
                <div class="mdl-cell mdl-cell--12-col">
                    <h2><?php echo $wrs_home_project_title; ?></h2>
                    <?php echo wpautop($wrs_home_project_desc); ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
*/
?>

<?php
$wrs_mailchimp_form = get_field('wrs_mailchimp_form', 'options');
if( $wrs_mailchimp_form !== null ) {
    ?>
    <div class="reducer mb20 subscribe">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <?php echo $wrs_mailchimp_form; ?>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php

get_footer();
