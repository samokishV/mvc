<?php

namespace App\Lib;

class Cookie
{
    public static function set($key, $value, $time = 60 * 60 * 24 * 7)
    {
        setcookie($key, $value, time() + $time, '/') ;
    }

    public static function get($key)
    {
        if (isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        }
        return null;
    }

    public static function delete($key, $value)
    {
		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie) {
       			$parts = explode('=', $cookie);
				$name = trim($parts[0]);
				if($name==$key) {
				setcookie($name, '', time()-1000);
				setcookie($name, '', time()-1000, '/');
				return true;
				}
			}
		} else return false;
    }

    public static function deleteAll() {
		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie) {
       			$parts = explode('=', $cookie);
				$name = trim($parts[0]);
				setcookie($name, '', time()-1000);
				setcookie($name, '', time()-1000, '/');
				return true;
			}
		} else return false;
    }
}
