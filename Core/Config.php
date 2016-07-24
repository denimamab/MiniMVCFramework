<?php
namespace Core;
class Config{

    private $settings = [];
    private static $instance;

    /**
     * GET instance of Config class ( Design Pattern Singleton )
     * @return Config
     */
    public static function getInstance(){
        if(self::$instance === null)
            self::$instance =  new Config();
        return self::$instance;
    }

    /**
     * Config constructor.
     * Initialize settings
     */
    public function __construct()
    {
        $this->settings = require ROOT . '/Config/config.php';
    }
    
    /**
     * GET settings matching to id given
     * @param $key
     * @return mixed|null
     */
    public function get($key){
        return isset($this->settings[$key])?$this->settings[$key]:null;
    }

}