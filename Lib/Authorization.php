<?php

namespace App\Lib;

class Authorization {

    private static $email = "user@mail.ru";
    private static $password = "1234";

    public function login() {
        if($_POST && isset($_POST['email']) && isset($_POST['password'])) {
            if(self::$email == $_POST['email'] && self::$password == $_POST['password']) {
                session_write_close();
                session_start();
                Session::set('email', self::$email);
                return true;
            }
            else return false;
        }

        else return false;

    }

    public static function isAuth() {
        if(isset($_COOKIE['PHPSESSID'])) {
            session_write_close();
            session_start();
            if(Session::get('email')) return true;
            else return self::login();
        }

        else return self::login();
    }

    public static function getlogin() {
        if(self::isAuth()) return Session::get('email');
        return null;
    }

    public function logout() {
        if(self::isAuth()) Session::delete('email');
    }

}