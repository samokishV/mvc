<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 25.01.19
 * Time: 16:16
 */

$cfg = \ActiveRecord\Config::instance();

$cfg->set_connections(
    array(
        'development' => 'mysql://samokish:qwerty@localhost/samokish_db'
    )
);
$cfg->set_default_connection('development');