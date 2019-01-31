<?php

class Buyers extends \ActiveRecord\Model
{
    public static $belongs_to = array(
        array('App\ActiveRecord\Users')
    );
}
