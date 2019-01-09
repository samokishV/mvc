<?php

namespace App\Lib;

class Authorization {

    public function login()
    {

        if ($_POST && isset($_POST['email']) && isset($_POST['password'])) {

            $user = \Users::find_by_email($_POST['email']);
            if (!isset($user)) {
                Session::setFlash('Incorrect email. Please try again.', 'danger');
                return false;
            } else {
                $password = $user->password;
                $login = $user->name;

                if ($password == hash('md5', $_POST['password'])) {
                    session_write_close();
                    session_start();
                    Session::set('login', $login);
                    Session::setFlash('Authorization completed successfully.', 'success');
                    return true;
                } else {
                    Session::setFlash('Incorrect password. Please try again.', 'danger');
                    return false;
                }
            }
        }

    }

    public static function isAuth() {
        if(isset($_COOKIE['PHPSESSID'])) {
            session_write_close();
            session_start();
            if(Session::get('login')) return true;
            else return self::login();
        }

        else return self::login();
    }

    public static function getlogin() {
        if(self::isAuth()) return Session::get('login');
        return null;
    }

    public function logout() {
        if(self::isAuth()) Session::delete('login');
    }

}