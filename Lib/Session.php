<?php

namespace App\Lib;

class Session
{
    protected static $flashMessage;
    protected static $flashType;

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }

    public static function delete($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function setFlash($message, $type)
    {
        self::$flashMessage = $message;
        self::$flashType = $type;
    }

    public static function hasFlash()
    {
        return !is_null(self::$flashMessage);
    }

    public static function flash()
    {
        echo self::$flashMessage;
        self::$flashMessage = null;
    }

    public static function flashType()
    {
        echo self::$flashType;
        self::$flashType = null;
    }
}
