<?php

namespace Core;

class Autoloader{

    /**
     * CALL to a custom autoloader method
     */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'load'));
    }

    /**
     * Autoload method
     * load class given
     * @param $class
     */
    public static function load($class)
    {
        //$path = str_replace('Core\\', '', $class);
        $path = explode('\\', $class);
        $path = implode('/',$path);
        require ROOT . "/{$path}.php";
    }

}