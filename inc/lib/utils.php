<?php

function get_first_paragraph($id=null, $words_num=null, $no_tag=null, $strip_tags=false) {
    if($id === null) {
        global $post;
        if( $strip_tags ) {
            $no_tags = strip_tags(get_the_content());
            $no_lines = str_replace("\n",' ', $no_tags );
            $no_spaces = preg_replace('!\s+!', ' ', $no_lines);

            $str = wpautop( $no_spaces );
        }
        else {
            $str = wpautop( get_the_content() );
        }
    }
    else {
        $post = get_post($id);

        if( $strip_tags ) {
            $no_tags = strip_tags($post->post_content);
            $no_lines = str_replace("\n",' ', $no_tags );
            $no_spaces = preg_replace('!\s+!', ' ', $no_lines);

            $str = wpautop( $no_spaces );
        }
        else {
            $str = wpautop( $post->post_content );
        }
    }

    $result = get_first_paragraph_str($str, $words_num, $no_tag, $strip_tags);

    return $result;
}

function get_first_paragraph_str($str='', $words_num=null, $no_tag=null, $strip_tags=false) {
    $str = wpautop( $str );

    $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
    if( $no_tag ) {
        $str = strip_tags($str);
    }
    else {
        $str = strip_tags($str, '<a><strong><em>');
    }
    $str = strip_shortcodes($str);

    if($words_num !== null) {
        $str_list = explode(' ', $str);

        $str_end = '';
        if( count($str_list) > $words_num ) {
            $str_end = '...';
        }
        $words_list = array_slice($str_list, 0, $words_num);

        $str = implode(' ', $words_list);
        $str .= $str_end;
    }

    if( $no_tag ) {
        return $str;
    }
    else {
        return '<p>' . $str . '</p>';
    }
}

function cpt_description( $cpt ) {
    global $wp_post_types;
    $post_type = $cpt;
    $description = $wp_post_types[$post_type]->description;

    return $description;
}


function data_list( $post_term, $tax ) {
    /*
     * $post_term - array of terms
     * $tax - taxonomy data gotten from get_taxonomy()
     */
    $data_list_str = '';

    if( $post_term && ! empty( $post_term ) ) {
        $data_list_str .= '<li>';
        $data_list_str .= $tax->labels->singular_name . ': ';

        $sep = '';
        foreach($post_term as $pt) {
            $data_list_str .= $sep . '<a href="' . get_term_link($pt) . '">' . $pt->name . '</a>';

            $sep = ', ';
        }

        $data_list_str .= '</li>';
    }

    return $data_list_str;
}


function get_empty_image() {
    $wrs_site_thumbnail_blank = get_field('wrs_site_thumbnail_blank', 'options');

    $empty_img = '';
    if( $wrs_site_thumbnail_blank ) {
        $srcset = array();
        $srcset[] = $wrs_site_thumbnail_blank['sizes']['thumbnail'] . ' ' . $wrs_site_thumbnail_blank['sizes']['thumbnail-width'] . 'w';
        $srcset[] = $wrs_site_thumbnail_blank['sizes']['medium'] . ' ' . $wrs_site_thumbnail_blank['sizes']['medium-width'] . 'w';
        $srcset[] = $wrs_site_thumbnail_blank['sizes']['medium_additional'] . ' ' . $wrs_site_thumbnail_blank['sizes']['medium_additional-width'] . 'w';

        $empty_img = '<img src="' . $wrs_site_thumbnail_blank['sizes']['medium_additional'] . '" alt="" srcset="' . implode(',', $srcset) . '" sizes="(max-width: ' . $wrs_site_thumbnail_blank['sizes']['medium_additional-width'] . 'px) 100vw, ' . $wrs_site_thumbnail_blank['sizes']['medium_additional-width'] . 'px">';
    }

    return $empty_img;
}




