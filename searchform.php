<div class="w960">
    <form role="search" method="get" id="searchform" class="searchform df" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: auto; flex: 1; padding-right: 10px;">
            <input class="mdl-textfield__input" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" >
            <label class="mdl-textfield__label" for="s"></label>
        </div>
        <div style="width: auto; margin-top: 20px;">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Знайти</button>
        </div>
    </form>
</div>
