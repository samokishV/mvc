<?php
/**
 * Created by PhpStorm.
 * User: Victoria
 * Date: 13-Dec-18
 * Time: 3:13 PM
 */
namespace App\Lib;

use App\Models\Products as Products;

class Route
{
    protected $controller = "Main";
    protected $action = "index";
    protected static $params = "1";
    // protected $types = ['plants'];
    //protected $subtypes = ['krupnomery', 'decorative leafy'];
    protected $types;
    protected $subtypes;
    protected static $type;
    protected static $subtype;
    protected static $name;

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public static function getParams()
    {
        return self::$params;
    }

    public static function getType()
    {
        return self::$type;
    }

    public static function getSubtype()
    {
        return self::$subtype;
    }

    public static function getName()
    {
        return self::$name;
    }

    public static function hasType()
    {
        if (self::getType()) {
            return true;
        } else {
            return false;
        }
    }

    public static function hasSubtype()
    {
        if (self::getSubtype()) {
            return true;
        } else {
            return false;
        }
    }

    public static function hasName()
    {
        if (self::getName()) {
            return true;
        } else {
            return false;
        }
    }

    public function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $categories = Products::getCategoriesList();
        $this->types = array_keys($categories);
        $subtypes = array();
        foreach ($categories as $subArr) {
            $subtypes = array_merge($subtypes, array_values($subArr));
        }
        $this->subtypes = $subtypes;

        if (!empty($routes[1])) {
            if (in_array($routes[1], $this->types)) {
                $this->controller = "Products";
                $this->action = "type_index";
                self::$type = $routes[1];
                array_shift($routes);
                if (!empty($routes[1])) {
                    $routes[1] = str_replace('-', ' ', $routes[1]);
                }
                if (!empty($routes[1]) && in_array($routes[1], $this->subtypes)) {
                    $this->action = "subtype_index";
                    self::$subtype = $routes[1];
                    array_shift($routes);
                }
                if (!empty($routes[1])) {
                    $routes[3] = $routes[1];
                }
            } else {
                $this->controller = ucfirst($routes[1]);
            }
        }

        if (!empty($routes[2])) {
            $this->action = $routes[2];
        }

        if (!empty($routes[3])) {
            self::$params = $routes[3];
        } else {
            self::$params = "1";
        }

        return true;
    }
}
