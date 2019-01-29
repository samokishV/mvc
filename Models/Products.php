<?php

namespace App\Models;

use App\Lib\Route as Route;

class Products
{
    public static $products;
    public static $number_of_page;

    public function add()
    {
        if(isset($_POST['title'], $_POST['description'], $_POST['type'], $_POST['price'], $_POST['code'], $_POST['in_stock'])) {
        	$product = \Products::create(array('title' => $_POST['title'], 'description' => $_POST['description'], 'type' => $_POST['type'], 'price' => $_POST['price'], 'code' => $_POST['code'], 'in_stock' => $_POST['in_stock']));
            if($product) return $product->id;
        }
    }

    public function edit($id)
    {
        if(isset($_POST['title'], $_POST['description'], $_POST['type'], $_POST['price'], $_POST['code'], $_POST['in_stock'])) {

        	$product = $this->get_product($id);
			if(isset($product)) {
			    $product->title = $_POST['title'];
			    $product->description = $_POST['description'];
			    $product->type = $_POST['type'];
			    $product->price = $_POST['price'];
			    $product->code = $_POST['code'];
			    $product->in_stock = $_POST['in_stock'];
			    $product->save();
			    return true;
				
			}
			else return false;
        }
        else return false;
    }

    public function delete($id)
    {
        $product = $this->get_product($id);
        if(isset($product)) {
			$result = $product->delete($id);
			return true;
		}
    }

    public function search($keyword)
    {
	    $products = \Products::find('all', array('conditions' => "title LIKE '%".$keyword."%' OR 
        type LIKE '%".$keyword."%' OR subtype LIKE '%".$keyword."%'"));
		return $products;	
    }

    public static function setNumberOfPage($number)
    {
        self::$number_of_page = $number;
    }

    public static function getNumberOfPage()
    {
        return self::$number_of_page;
    }

    public function uniq_search($product_condition, $page)
    {
        $price_condition = "";
        if(isset($_POST['price'])) {
            $price = $_POST['price'];
            $price_condition = " AND price < $price ";
        }
        $in_stock_condition = "";
        if(isset($_POST['in_stock']) && $_POST['in_stock']=="Yes") {
            $in_stock_condition = " AND in_stock > 0 ";
        } 
	    if(isset($_POST['not_in_stock']) && $_POST['not_in_stock']=="No") {
            $in_stock_condition = " AND in_stock <= 0 ";
        }
        if(isset($_POST['in_stock']) && isset($_POST['not_in_stock'])) {
            $in_stock_condition = "";
        }
        $products_number = count(\Products::find('all', array('conditions' => $product_condition." ".$price_condition." ".$in_stock_condition)));
        $products_on_page = 3;
        $number_of_pages = ceil($products_number/$products_on_page);
        self::setNumberOfPage($number_of_pages);
        $start = $products_on_page*($page-1);
	    $products = \Products::find('all', array('conditions' => $product_condition." ".$price_condition." ".$in_stock_condition, 'limit' => $products_on_page, 'offset' => $start));
        return $products;
    }

    public function get_list()
    {
        $products = \Products::find('all');
        return $products;
    }

    public function get_by_type($page)
    {
        $page = (int) $page;
        $type = Route::getType();
        $product_condition = "type LIKE '".$type."'";
        $product = new Products();
        $products = $product->uniq_search($product_condition, $page);
		return $products;	
    }

    public function get_by_subtype($page)
    {
        $page = (int) $page;
        $subtype = Route::getSubtype();
        $product_condition = "subtype LIKE '".$subtype."'";
        $product = new Products();
        $products = $product->uniq_search($product_condition, $page);
		return $products;	
    }

	public function get_product($id)
	{	
	    $product = \Products::find_by_id($id);
		return $product;		
	}

	public function decrease($id, $qt)
	{
		$product = $this->get_product($id);;
		$number = $product->in_stock - $qt;
		$product->in_stock = $number;
		$product->save();
	}

	public function increase($id, $qt) 
	{
		$product = $this->get_product($id);;
		$number = $product->in_stock + $qt;
		$product->in_stock = $number;
		$product->save();
	}    
}
