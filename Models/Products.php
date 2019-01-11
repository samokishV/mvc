<?php

namespace App\Models;

use App\Lib\Route as Route;

class Products
{
    public static $products;

    public function add()
    {
        if(isset($_POST['title'], $_POST['description'], $_POST['type'], $_POST['price'], $_POST['code'], $_POST['in_stock'])) {
        	$product = \Products::create(array('title' => $_POST['title'], 'description' => $_POST['description'], 'type' => $_POST['type'], 'price' => $_POST['price'], 'code' => $_POST['code'], 'in_stock' => $_POST['in_stock']));
            if($product) return true;
        }
        else return false;
    }

    public function edit()
    {
        if(isset($_POST['title'], $_POST['description'], $_POST['type'], $_POST['price'], $_POST['code'], $_POST['in_stock'])) {

        	$product = $this->get_product();
			if(isset($product)) {
			    $product->title = $_POST['title'];
			    $product->description = $_POST['description'];
			    $product->type = $_POST['type'];
			    $product->price = $_POST['price'];
			    $product->code = $_POST['in_stock'];
			    $product->in_stock = $_POST['code'];
			    $product->save();
			    return true;
				
			}
			else return false;
        }
        else return false;
    }

    public function delete()
    {
        $product = $this->get_product();
        if(isset($product)) $product->delete();
    }

	public function get_list()
	{	
	    $products = \Products::find('all');
		return $products;		
	}

	public function get_product()
	{	
		$route = new Route();
        $route->start();
        $id = (int) $route->getParams();
	    $product = \Products::find_by_id($id);
		return $product;		
	}    
}