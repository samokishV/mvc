<?php

namespace App\Models;

use App\Lib\Model as Model;

class Stock extends Model
{
	public static $products;

    public function get_data()
	{
        self::$products = include 'db.php';
        return self::$products;
	}
}
