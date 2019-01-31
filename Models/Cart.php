<?php

namespace App\Models;

use App\Lib\Session as Session;
use App\Lib\Cookie as Cookie;

class Cart
{
    private $products;
    private $cart;

    public function __construct()
    {
        $this->products = Cookie::get('products') == null ? array() : Cookie::get('products');
    }

    public function getProducts()
    {
        $totalPrice = 0;
        foreach ($this->products as $index=>$qt) {
            $product = \Products::find_by_id($index);
            $price = $product->price;
            $total = $qt*$price;
            $totalPrice += $total;
            $this->cart[$index] = array($product, 'qt'=>$qt, 'total'=>$total);
        }
        return $this->cart;
    }

    public function countProducts()
    {
        return count($this->products);
    }

    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $index=>$qt) {
            $product = \Products::find_by_id($index);
            $price = $product->price;
            $total = $qt*$price;
            $totalPrice += $total;
        }
        return $totalPrice;
    }

    public function addProduct($id, $qt)
    {
        $id = (int)$id;

        if (!isset($this->products[$id])) {
            Cookie::set("products[$id]", $qt);
            $this->products = Cookie::get('products');
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $id = (int)$id;
        $result = Cookie::delete("products[$id]", $this->products[$id]);
        $this->products = Cookie::get('products');
        return $result;
    }

    public function editProduct($id, $qt)
    {
        Cookie::set("products[$id]", $qt);
    }
}
