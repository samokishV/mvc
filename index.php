<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 2:59 PM
 */

session_start();

ini_set('display_errors', 1);

require __DIR__."/vendor/autoload.php" ;
define('DIR', __DIR__);

$cfg = \ActiveRecord\Config::instance();
$cfg->set_model_directory('ActiveRecord/models');
$cfg->set_connections(
  array(
    'development' => 'mysql://samokish:qwerty@localhost/samokish_db'
  )
);
$cfg->set_default_connection('development');

$route = new App\Lib\Route();
$route->start();

$action = $route->getAction();
$pieces = explode("_", $action);

for ($i=1; $i<count($pieces); $i++) {
    $pieces[$i] = ucfirst($pieces[$i]);
}
$action = implode($pieces);

$controller = "\App\Controllers\\".$route->getController()."Controller";
$controller1 = new $controller();
$controller1->$action();
