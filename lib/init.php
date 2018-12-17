<?php

function __autoload($class_name) {
    $lib_path = 'lib/'.strtolower($class_name).'.php';
    $controllers_path = 'controllers/'.strtolower($class_name).'.php';
    $model_path = 'models/'.strtolower($class_name).'.php';

    if(file_exists($lib_path)) {
        require_once($lib_path);
    }
    elseif(file_exists($controllers_path)) {
        require_once($controllers_path);
    }
    elseif(file_exists($model_path)) {
        require_once($model_path);
    }
    else {
        throw new Exception('Failed to include class:'.$class_name);
    }
}
