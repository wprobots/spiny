<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wp-robots
 */

get_header();
?>

    <div class="reducer">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col tac">
                <h1>Страница не найдена</h1>
                <p>Перейти на <a href="<?php echo get_permalink(2); ?>">главную</a>.</p>
            </div>
        </div>
    </div>

<?php
get_footer();
