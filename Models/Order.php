<?php 

namespace App\Models;

use App\Lib\Authorization as Authorization;
use App\Models\User as User;
use App\Models\Cart as Cart;

class Order
{
	public function getByUserId($id)
	{
		$buyer = \Buyers::find('all', array('select' => 'id'), array('conditions' => "user_id = $id"));

        if($buyer) {
            foreach($buyer as $info) {
                $buyer_id[] = $info->id;
            }
            $join1 = 'inner JOIN orders o ON(po.orders_id = o.id)';
            $join2 = 'left JOIN products p ON(po.products_id = p.id)';
            $orders = \ProductsOrder::find('all', array('joins' => array($join1, $join2), 'select' => 'o.id, o.date, p.title, po.total, po.qt', 'from' => 'products_orders as po', 'conditions' => array('o.buyer_id in (?)', $buyer_id)));
            return $orders;
        }
	}

    public function create($name, $email, $phone, $adress, $sessionEmail)
    {
        if(Authorization::isAuth()) {
            $user = new User();
            $user = $user->getByEmail($sessionEmail);
            $user_id = $user->id;     
        } else $user_id = null;

        $buyer = \Buyers::create(array('name' => $name, 'email' => $email,
            'phone' => $phone, 'address' => $adress, 'user_id' => $user_id
        )); 
        $buyer_id = $buyer->id;

        $cart = new Cart();
        $total = $cart->getTotalPrice();

        $order = \Orders::create(array('buyer_id' => $buyer_id, 'total' => $total));
        $orderId = $order->id;

        $data = $cart->getProducts();

        foreach ($data as $product) {
            $productId = $product[0]->id;
            $qt = $product['qt'];
            $total = $product['total'];
            $price = $total/$qt;
            $products_order = \ProductsOrder::create(array('qt' => $qt, 'total' => $total,
                'orders_id' => $orderId, 'products_id' => $productId));
        }
    }
}
