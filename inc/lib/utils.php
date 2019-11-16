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


function spiny_columns() {
    $blog_grid = get_option( 'spiny_grid' );

    $col = 2;
    if( $blog_grid && (int)$blog_grid > 0 ) {
        if( (int)$blog_grid === 1 ) {
            $col = 6;
        }
        if( (int)$blog_grid === 2 ) {
            $col = 4;
        }
        if( (int)$blog_grid === 3 ) {
            $col = 3;
        }
        if( (int)$blog_grid === 4 ) {
            $col = 2;
        }
        if( (int)$blog_grid === 5 ) {
            $col = 1;
        }
    }

    return $col;
}


/**
 * https://wp-kama.ru/question/funktsiya-skloneniya-slov-posle-chisel-php
 * Склонение слова после числа.
 *
 * Примеры вызова:
 * num_decline( $num, 'книга,книги,книг' )
 * num_decline( $num, [ 'книга','книги','книг' ] )
 * num_decline( $num, 'книга', 'книги', 'книг' )
 * num_decline( $num, 'книга', 'книг' )
 *
 * @param  int|string    $number  Число после которого будет слово. Можно указать число в HTML тегах.
 * @param  string|array  $titles  Варианты склонения или первое слово для кратного 1.
 * @param  string        $param2  Второе слово, если не указано в параметре $titles.
 * @param  string        $param3  Третье слово, если не указано в параметре $titles.
 *
 * @return string 1 книга, 2 книги, 10 книг.
 *
 * @version 2.0
 */
function num_decline( $number, $titles, $param2 = '', $param3 = '' ){

    if( $param2 )
        $titles = [ $titles, $param2, $param3 ];

    if( is_string($titles) )
        $titles = preg_split( '/, */', $titles );

    if( empty($titles[2]) )
        $titles[2] = $titles[1]; // когда указано 2 элемента

    $cases = [ 2, 0, 1, 1, 1, 2 ];

    $intnum = abs( intval( strip_tags( $number ) ) );

    return "$number ". $titles[ ($intnum % 100 > 4 && $intnum % 100 < 20) ? 2 : $cases[min($intnum % 10, 5)] ];
}


