<?php

add_filter('excerpt_length', function() {
    return 75;
});

add_filter('excerpt_more', function($more) {
    return '...';
});