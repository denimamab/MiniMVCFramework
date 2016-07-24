<?php

namespace Core\Session;


class ControlSession extends Session
{
    public function set($key, $val)
    {
        $_SESSION['ctrl'][$key] = $val;
    }

    public function get($key)
    {
        return isset($_SESSION['ctrl'][$key])?$_SESSION['ctrl'][$key] : null;
    }

    public function rm($key)
    {
        unset($_SESSION['ctrl'][$key]);
    }
}