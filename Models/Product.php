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
}
