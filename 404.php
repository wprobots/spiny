<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package spiny
 */

get_header();
?>

<div class="reducer">
    <div class="spiny_grid_container">
        <div class="spiny_grid">
            <div class="spiny_grid__col7">
                <h1><?php echo __( 'Categories:', 'spiny' ); ?></h1>
                <p><?php
                    printf( __( 'Перейти на %sглавную%s', 'spiny' ), '<a href="' . esc_url( home_url( '/' ) ) . '">', '</a>' );
                ?></p>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
