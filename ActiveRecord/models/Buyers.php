<?php

class Buyers extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('App\ActiveRecord\Users')
    );
}
