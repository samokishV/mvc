<?php

class Model_Product 
{
public static $products = array(

	array(
        'img'=>array('1.jpg', '2.jpg', '3.jpg', '1.jpg'),
        'name'=>'Ficus lyrata',
        'price'=>'450 UAH',
        'code'=>'10370',
        'in_stock'=>'10pc'
    ),

    array(
        'img'=>array('1.jpg', '2.jpg', '3.jpg', '1.jpg'),
        'name'=>'Araucaria',
        'price'=>'250 UAH',
        'code'=>'20568',
        'in_stock'=>'8pc'
    ),

   array(
       'img'=>array('1.jpg', '2.jpg', '3.jpg', '1.jpg'),
       'name'=>'Caryota mitis',
       'price'=>'310 UAH',
       'code'=>'51423',
       'in_stock'=>'18pc'
   ),

   array(
       'img'=>array('1.jpg', '2.jpg', '3.jpg', '1.jpg'),
       'name'=>'Codiaeum KL Mini Curl',
       'price'=>'658 UAH',
       'code'=>'65874',
       'in_stock'=>'2pc'
   ),

   array(
       'img'=>array('1.jpg', '2.jpg', '3.jpg', '1.jpg'),
       'name'=>'Dracaena Anita vertak',
       'price'=>'125 UAH',
       'code'=>'99999',
       'in_stock'=>'0pc'
   ),

    array(
        'img'=>array('1.jpg', '2.jpg', '3.jpg', '1.jpg'),
        'name'=>'Dracaena Riki',
        'price'=>'312 UAH',
        'code'=>'85469',
        'in_stock'=>'10pc'
    )
);

	public function get_data($id)
	{	
		$product = self::$products[$id];
		return $product;		
	}
}
