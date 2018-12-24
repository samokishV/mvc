<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 3:13 PM
 */
namespace App\Lib;

class Route
{
    protected $controller = "Main";
    protected $action = "index";
    protected $params;

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
       return $this->params;
    }

    public function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $this->controller = ucfirst($routes[1]);
        }

        if (!empty($routes[2])) {
            $this->action = $routes[2];
        }

        if (!empty($routes[3])) {
           $this->params = $routes[3];
        }
    }
}
