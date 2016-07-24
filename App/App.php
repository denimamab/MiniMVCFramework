<?php
namespace App;

use Core\Autoloader;
use Core\Config;
use Core\Database\MySQLDatabase;
use Core\Session\AuthSession;

class App{

    private static $instance;
    private $AuthSession_instance;
    private $ControlSession_instance;
    private  $db_instance;
    public $title;


    /**
     * App constructor.
     * Initialize title, loader, and Models
     */
    public function __construct()
    {
        $this->title = 'Project Name';
        $this->autoload();
        $this->Post = $this->getModel('Post');
        $this->Category = $this->getModel('Category');
        $this->Testimony = $this->getModel('Testimony');
        $this->Page = $this->getModel('Page');
        $this->User = $this->getModel('User');
    }

    /**
     * GET instance ( Design Pattern Singleton )
     * We need only one instance of App class
     * @return App
     */
    public static function getInstance()
    {
        if(self::$instance === null)
            self::$instance = new App();
        return self::$instance;
    }

    /**
     * Include autoloader
     */
    public function autoload()
    {
        require '../Core/Autoloader.php';
        Autoloader::register();
    }

    /**
     * GET model matching to the name given
     * for $name = post we'll return a PostModel instance
     * @param $name
     * @return mixed
     */
    public function getModel($name){
        $class = '\\App\\Model\\' . ucfirst($name) . 'Model';
        return new $class($this->getDb());
    }

    /**
     * GET Database instance from configurations given in Config class
     * Design Pattern Singleton
     * @return MySQLDatabase
     */
    public function getDb(){
        $config = Config::getInstance();
        if($this->db_instance === null)
            $this->db_instance = new MySQLDatabase(
                                                        $config->get('db_name'),
                                                        $config->get('db_user'),
                                                        $config->get('db_pass'),
                                                        $config->get('db_host')
                                                    );
        return $this->db_instance;
    }

    public function getAuthSession(){
        if($this->$AuthSession_instance === null)
            $this->AuthSession_instance = new AuthSession();
        return $this->AuthSession_instance;
    }

    public function getControlSession(){
        if($this->ControlSession_instance === null)
            $this->ControlSession_instance = new AuthSession();
        return $this->ControlSession_instance;
    }

}