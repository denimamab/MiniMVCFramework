<?php

namespace Core\Session;


class AuthSession extends Session
{
    public function set($key, $val)
    {
        $_SESSION['auth'][$key] = $val;
    }

    public function get($key)
    {
        return isset($_SESSION['auth'][$key])?$_SESSION['auth'][$key] : null;
    }

    public function rm($key)
    {
        unset($_SESSION['auth'][$key]);
    }
}