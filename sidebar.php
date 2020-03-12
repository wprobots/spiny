<?php

if ( ! is_active_sidebar( 'spiny-sidebar' ) ) {
	return;
}
?>

<div class="column column-33">
    <aside id="secondary" class="widget-area">
        <?php dynamic_sidebar( 'spiny-sidebar' ); ?>
    </aside>
</div>


