<?php

namespace App\Controller\Admin;


use App\App;

/**
 * @property \Core\Auth\DBAuth auth
 */
class AppController extends \App\Controller\AppController
{
    protected $styles = [];
    protected $scripts = [];
    /**
     * AppController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!$this->isAuthorized())
            $this->forbidden();

    }

    public function isAuthorized()
    {
        $auth = App::getInstance()->getAuth();
        if($auth->logged()
            && (
                $auth->isOwner()
                || $auth->isAdmin()
            ))
            return true;

        return false;
    }

    public function style($path)
    {
        $this->styles[] = $path;
    }
    public function script($path)
    {
        $this->scripts[] = $path;
    }
}