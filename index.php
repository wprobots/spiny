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
$wrs_site_thumbnail_blank = get_field('wrs_site_thumbnail_blank', 'options');
$empty_img = $wrs_site_thumbnail_blank['sizes']['thumbnail'];

$frontpage_id = get_option( 'page_on_front' );
?>

    <div class="reducer">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <?php echo breadcrumbs(); ?>

                <h1><?php echo $current->label ?></h1>
                <?php
                if( is_post_type_archive( array('job', 'event', 'service', 'human') ) ) {

                    $post_type_description = cpt_description($wp_query->query['post_type']);
                    if( ! empty($post_type_description) ) {
                        echo wpautop($post_type_description);
                    }
                }
                ?>
            </div>

            <?php
            $wrs_top_articles_section_title = get_field('wrs_top_articles_section_title', $frontpage_id);
            $wrs_top_articles = get_field('wrs_top_articles', $frontpage_id);
            $wrs_top_articles_featured = get_field('wrs_top_articles_featured', $frontpage_id);
            $wrs_top_articles_button_title = get_field('wrs_top_articles_button_title', $frontpage_id);
            $wrs_top_articles_button_url = get_field('wrs_top_articles_button_url', $frontpage_id);
            $wrs_top_articles_section_tagline = get_field('wrs_top_articles_section_tagline', $frontpage_id);
            $wrs_top_articles_section_desc = get_field('wrs_top_articles_section_desc', $frontpage_id);
            $wrs_top_articles_section_latest_title = get_field('wrs_top_articles_section_latest_title', $frontpage_id);

            if( $wrs_top_articles ) {
                ?>
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="note mt45"><?php echo $wrs_top_articles_section_tagline; ?></div>
                    <h1><?php echo $wrs_top_articles_section_title; ?></h1>
                </div>
                <?php
                foreach( $wrs_top_articles as $article ) {

                    $image = get_the_post_thumbnail_url( $article['wrs_top_articles_item']->ID, 'medium' );

                    if( ! $image ) {
                        $image = $wrs_site_thumbnail_blank['url'];
                    }
                    ?>
                    <a href="<?php echo get_permalink($article['wrs_top_articles_item']->ID); ?>" class="mdl-cell mdl-cell--6-col posr big_block" style="background: url('<?php echo $image; ?>') 50% 50% no-repeat;-webkit-background-size: cover;background-size: cover;">
                        <div class="vertical_middle p20">
                            <h2><?php echo get_the_title($article['wrs_top_articles_item']->ID); ?></h2>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"><?php echo $wrs_cta_read_button_title; ?></button>
                        </div>
                    </a>
                    <?php
                }
            }
            if( $wrs_top_articles_section_desc ) {
                ?>
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="w70 pt50 pb50">
                        <?php echo wpautop($wrs_top_articles_section_desc); ?>
                    </div>
                </div>
                <?php
            }
            if( $wrs_top_articles_featured ) {
                $wrs_top_articles_featured_list = array();
                $counter = 0;
                foreach( $wrs_top_articles_featured as $article ) {
                    $image = get_the_post_thumbnail_url( $article['wrs_top_articles_featured_item']->ID, 'medium_additional' );
                    if( ! $image ) {
                        $image = $wrs_site_thumbnail_blank['url'];
                    }
                    $wrs_top_articles_featured_list[] = array(
                        'link' => get_permalink($article['wrs_top_articles_featured_item']->ID),
                        'title' => get_the_title($article['wrs_top_articles_featured_item']->ID),
                        'desc' => get_first_paragraph($article['wrs_top_articles_featured_item']->ID, 13, true, true),
                        'image' => $image
                    );


                }
                ?>
                <div class="mdl-cell mdl-cell--8-col posr cross_links">
                    <div class="df full_width">
                        <div class="df_col full_width mb15 gray_block">
                            <a href="<?php echo $wrs_top_articles_featured_list[0]['link']; ?>" class="df full_width block_hover cinh bdn">
                                <div class="half_width ovh cross_links_img" style="padding-right: 8px; -webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
                                    <img src="<?php echo $wrs_top_articles_featured_list[0]['image']; ?>" alt="" class="full_width">
                                </div>
                                <div class="half_width ">
                                    <h4 class="p20 m0"><?php echo $wrs_top_articles_featured_list[0]['title']; ?></h4>
                                    <p class="p20 m0 pt0"><?php echo $wrs_top_articles_featured_list[0]['desc']; ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="df_col full_width">
                            <a href="<?php echo $wrs_top_articles_featured_list[1]['link']; ?>" class="df full_width block_hover cinh bdn gray_block">
                                <div class="half_width">
                                    <h4 class="p20 m0"><?php echo $wrs_top_articles_featured_list[1]['title']; ?></h4>
                                    <p class="p20 m0 pt0"><?php echo $wrs_top_articles_featured_list[1]['desc']; ?></p>
                                </div>
                                <div class="half_width ovh cross_links_img" style="padding-left: 8px; -webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
                                    <img src="<?php echo $wrs_top_articles_featured_list[1]['image']; ?>" alt="" class="full_width">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--4-col cross_links">
                    <a href="<?php echo $wrs_top_articles_featured_list[2]['link']; ?>" class="df full_height block_hover cinh bdn">
                        <div class="half_height ovh cross_links_img" style="margin-bottom: 16px; height: auto;">
                            <img src="<?php echo $wrs_top_articles_featured_list[2]['image']; ?>" alt="" class="full_width">
                        </div>
                        <div class="half_height gray_block">
                            <h4 class="p20 m0"><?php echo $wrs_top_articles_featured_list[2]['title']; ?></h4>
                            <p class="p20 m0 pt0"><?php echo $wrs_top_articles_featured_list[2]['desc']; ?></p>
                        </div>
                    </a>
                </div>
                <?php
            }
            if( $wrs_top_articles_section_latest_title ) {
                ?>
                <div class="mdl-cell mdl-cell--12-col">
                    <h2 class="mt45"><span><?php echo $wrs_top_articles_section_latest_title; ?></span></h2>
                </div>
                <?php
            }

            while ( have_posts() ) :
                the_post();

                $image = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
                if( ! $image ) {
                    $image = $wrs_site_thumbnail_blank['sizes']['thumbnail'];
                }
                ?>
                <div class="mdl-cell mdl-cell--6-col post_link">
                    <a href="<?php echo get_permalink($post->ID); ?>" class="fll mr10 dark_hover bdn">
                        <img src="<?php echo $image; ?>" alt="">
                    </a>
                    <h4 class="mt0"><a href="<?php echo get_permalink($pst->ID); ?>"><?php echo get_the_title($post->ID); ?></a></h4>
                    <p class="gray_text"><?php echo get_first_paragraph($pst, 13, true, true); ?></p>
                    <a href="<?php echo get_permalink($post->ID); ?>" class="blue_link"><?php echo $wrs_cta_read_button_title; ?></a>
                </div>
            <?php
            endwhile;

            include_once( __DIR__ . '/inc/archive-pagination.php' );
            ?>
        </div>
    </div>

<?php
get_footer();
