<?php
$pagination = get_the_posts_pagination(array(
    'prev_text'          => '',
    'next_text'          => '',
    'screen_reader_text' => '&nbsp;'
));

if( ! empty( $pagination ) ) {
    ?>
    <div class="spiny_grid__col7">
        <?php
        echo $pagination;
        ?>
    </div>
    <?php
}