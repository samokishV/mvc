<?php

function autoload($class) {

    // base directory
    $base_dir = __DIR__;

    // namespace prefix
    $prefix = 'App\\';

    // if class use another nemespace prefix
    $len = strlen($prefix);
    if(strncmp($prefix, $class, $len) !==0) {
        // move to the next registered autoload
        return;
    }

    $relative_class = substr($class, $len-1);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }

}

spl_autoload_register('autoload');
