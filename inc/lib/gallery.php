<?php
add_filter('post_gallery','customFormatGallery',10,2);
function customFormatGallery($string, $attr) {
    $idx_hach = md5($attr['ids']);
    $output = '<div class="gallery">';
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));
    foreach($posts as $imagePost) {
        $image = get_post($imagePost->ID);
        $image_title = $image->post_title;
        $image_caption = $image->post_excerpt;

        $thumbnail = wp_get_attachment_image_src($imagePost->ID, 'thumbnail')[0];

        //print_r($thumbnail);

        $img = wp_get_attachment_image_src($imagePost->ID, 'large')[0];
        $output .= '<a href="' . $img . '" title="' . $image_caption . '" data-site-title="' . get_bloginfo() . '" class="gallery-item"><img src="' . $thumbnail . '" alt=""></a>';
    }

    $output .= "</div>";

    return $output;
}