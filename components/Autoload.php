<?php

/**
 * The __autoload function for automatically connecting classes
 */
function __autoload($class_name)
{
    // Array of folders
    $array_paths = array(
        '/models/',
        '/components/',
        '/controllers/',
    );

    foreach ($array_paths as $path) {

        $path = ROOT . $path . $class_name . '.php';

        if (is_file($path)) {
            include_once $path;
        }
    }
}
