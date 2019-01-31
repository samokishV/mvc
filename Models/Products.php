<?php

namespace App\Models;

use App\Lib\Route as Route;
use App\Models\Images as Images;

class Products
{
    public static $products;
    public static $numberOfPage;

    public function add()
    {
        if (isset($_POST['title'], $_POST['description'], $_POST['type'], $_POST['subtype'],
            $_POST['price'], $_POST['code'], $_POST['in_stock'])) {
            $product = \Products::create(array('title' => $_POST['title'],
                'description' => $_POST['description'], 'type' => $_POST['type'],
                'subtype' => $_POST['subtype'], 'price' => $_POST['price'],
                'code' => $_POST['code'], 'in_stock' => $_POST['in_stock']));
            if ($product) {
                return $product->id;
            }
        }
    }

    public function edit($id)
    {
        if (isset($_POST['title'], $_POST['description'], $_POST['type'], $_POST['subtype'],
            $_POST['price'], $_POST['code'], $_POST['in_stock'])) {
            $product = $this->getProduct($id);
            if (isset($product)) {
                $product->title = $_POST['title'];
                $product->description = $_POST['description'];
                $product->type = $_POST['type'];
                $product->subtype = $_POST['subtype'];
                $product->price = $_POST['price'];
                $product->code = $_POST['code'];
                $product->in_stock = $_POST['in_stock'];
                $product->save();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if (self::productNotOrdered($id)) {
            $images = new Images();
            $images->deleteAll($id);
            $product = $this->getProduct($id);
            if (isset($product)) {
                $result = $product->delete($id);
                return true;
            }
        }
    }

    public static function productNotOrdered($id)
    {
        $result = \ProductsOrder::find_by_products_id($id);
        if (!$result) {
            return true;
        } else {
            return false;
        }
    }

    public static function getCategoriesList()
    {
        $categories = new \Categories();
        $result = $categories->find('all');

        foreach ($result as $category) {
            $arr[$category->type][] = $category->subtype;
        }

        return $arr;
    }

    public function search($keyword)
    {
        $products = \Products::find('all', array('conditions' => "title LIKE '%".$keyword."%' OR 
        type LIKE '%".$keyword."%' OR subtype LIKE '%".$keyword."%'"));
        return $products;
    }

    public static function setNumberOfPage($number)
    {
        self::$numberOfPage = $number;
    }

    public static function getNumberOfPage()
    {
        return self::$numberOfPage;
    }

    public function uniq_search($productCondition, $page)
    {
        $priceCondition = "";
        if (isset($_POST['price'])) {
            $price = $_POST['price'];
            $priceCondition = " AND price < $price ";
        }
        $inStockCondition = "";
        if (isset($_POST['in_stock']) && $_POST['in_stock']=="Yes") {
            $inStockCondition = " AND in_stock > 0 ";
        }
        if (isset($_POST['not_in_stock']) && $_POST['not_in_stock']=="No") {
            $inStockCondition = " AND in_stock <= 0 ";
        }
        if (isset($_POST['in_stock']) && isset($_POST['not_in_stock'])) {
            $inStockCondition = "";
        }
        $productsNumber = count(\Products::find('all', array('conditions' => $productCondition." ".$priceCondition." ".$in_stock_condition)));
        $productsOnPage = 3;
        $numberOfPages = ceil($productsNumber/$productsOnPage);
        self::setNumberOfPage($numberOfPages);
        $start = $productsOnPage*($page-1);
        $products = \Products::find('all', array('conditions' => $productCondition." ".$priceCondition." ".$in_stock_condition, 'limit' => $productsOnPage, 'offset' => $start));
        return $products;
    }

    public function getList()
    {
        $products = \Products::find('all');
        return $products;
    }

    public function getByType($page)
    {
        $page = (int) $page;
        $type = Route::getType();
        $productCondition = "type LIKE '".$type."'";
        $product = new Products();
        $products = $product->uniqSearch($productCondition, $page);
        return $products;
    }

    public function getBySubtype($page)
    {
        $page = (int) $page;
        $subtype = Route::getSubtype();
        $productCondition = "subtype LIKE '".$subtype."'";
        $product = new Products();
        $products = $product->uniqSearch($productCondition, $page);
        return $products;
    }

    public function getProduct($id)
    {
        $product = \Products::find_by_id($id);
        return $product;
    }

    public function decrease($id, $qt)
    {
        $product = $this->getProduct($id);
        $number = $product->in_stock - $qt;
        $product->in_stock = $number;
        $product->save();
    }

    public function increase($id, $qt)
    {
        $product = $this->getProduct($id);
        $number = $product->in_stock + $qt;
        $product->in_stock = $number;
        $product->save();
    }
}
