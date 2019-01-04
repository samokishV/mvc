<?php

namespace App\Models;

use App\Lib\Session as Session;

class Cart
{
    private $products;
    private $cart;

    function __construct()
    {
        session_write_close();        
        session_start();
        $this->products = Session::get('plants') == null ? array(): unserialize(Session::get('plants'));
    }

    public function getProducts()
    {
        $products = include 'db.php';

        foreach($this->products as $index=>$qt) {
            $this->cart[$index] = $products[$index];
            $this->cart[$index]['qt'] = $qt;
            $price = (int) $products[$index]['price'];
            $total = $qt*$price;
            $this->cart[$index]['total'] = $total;
        }

        return $this->cart;
    }

    public function countProducts() 
    {
        return count($this->products);
    }

    public function addProduct($id, $qt)
    {
        $id = (int)$id;

        if (!in_array($id, $this->products)) {
          $this->products[$id]=$qt;
        }

        session_write_close();
        session_start();
        Session::set('plants', serialize($this->products));
    }

    public function deleteProduct($id)
    {
        $id = (int)$id;

        if (array_key_exists($id, $this->products)){
            unset($this->products[$id]);
        }

        session_write_close();
        session_start();
        Session::set('plants', serialize($this->products));
    }

    public function clear()
    {
        session_write_close();
        session_start();
        Session::delete('plants');
    }

    public function isEmpty()
    {
        return !$this->products;
    }
}
