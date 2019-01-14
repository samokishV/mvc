<?php
//namespace Models;

class Products extends \ActiveRecord\Model
{
    public static $has_many = [
        ['images']
    ];
}
