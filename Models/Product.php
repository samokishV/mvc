<?php

namespace App\Models;

// use App\Lib\Model as Model;

class Product
{
    public static $products;

	public function get_data($id)
	{	
		self::$products = include 'db.php';
	    $product = self::$products[$id];
		return $product;		
	}

	public function get_list()
	{	
		self::$products = include 'db.php';
	    $products = self::$products;
		return $products;		
	}

	public function get_product()
	{	
		self::$products = include 'db.php';
		$route = new Route();
        $route->start();
        $id = (int) $route->getParams();
	    $product = self::$products[$id];
		return $product;		
	}    
}
