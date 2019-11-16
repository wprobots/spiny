<?php

if ($handle = opendir(__DIR__)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != "module.php") {
            $module = __DIR__ . '/' . $entry;
            $ext = pathinfo($module, PATHINFO_EXTENSION);
            if( $ext === 'php' ) {
                include_once __DIR__ . '/' . $entry;
            }
        }
    }
    closedir($handle);
}