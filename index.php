<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 2:59 PM
 */

ini_set('display_errors', 1);

include("init.php");

$route = new App\Lib\Route();
$route->start();

$action = "action_".$route->getAction();

$controller = "\App\Controllers\\".$route->getController();
$controller1 = new $controller();
$controller1->$action();






