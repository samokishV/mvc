<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11.01.19
 * Time: 17:26
 */

namespace App\Models;

use App\Lib\Session as Session;

class User
{
    public static function isAdmin()
    {
        session_write_close();
        session_start();
        if(Session::get('login') == 'admin') {
            return true;
        } else {
            return false;
        }
    }
}