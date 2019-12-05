<?php
$args = array(
    'base'               => '%_%',
    'format'             => '?paged=%#%',
    'show_all'           => false,
    'prev_next'          => true,
    'prev_text'          => __('« Previous'),
    'next_text'          => __('Next »'),
    'type'               => 'plain',
    'add_args'           => false,
    'add_fragment'       => '',
    'before_page_number' => '',
    'after_page_number'  => '',
    'end_size'     => 1,
    'mid_size'     => 2,
);

$pagination = get_the_posts_pagination(array(
    'prev_text'          => '',
    'next_text'          => '',
    'screen_reader_text' => '&nbsp;'
));

if( !empty($pagination) ) {
    ?>
    <div class="spiny_grid__col7">
        <?php
        echo $pagination;
        ?>
    </div>
    <?php
}