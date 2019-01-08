<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 2:59 PM
 */

ini_set('display_errors', 1);

require __DIR__."/vendor/autoload.php" ;

$cfg = \ActiveRecord\Config::instance();
$cfg->set_model_directory('ActiveRecord/models');
$cfg->set_connections(
  array(
    'development' => 'mysql://samokish:qwerty@localhost/samokish_db'
   // 'test' => 'mysql://username:password@localhost/test_database_name',
   // 'production' => 'mysql://username:password@localhost/production_database_name'
  )
);
$cfg->set_default_connection('development');

$route = new App\Lib\Route();
$route->start();

$action = "action_".$route->getAction();
$controller = new \App\Lib\Controller();

$controller = "\App\Controllers\\".$route->getController();
$controller1 = new $controller();
$controller1->$action();







