<?php

namespace Core\Session;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public function rm($key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        session_destroy();
    }
}