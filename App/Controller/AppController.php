<?php

namespace App\Controller;

use App\App;
use Core\Controller\Controller;

class AppController extends Controller
{

    public function __construct()
    {
        $this->viewPath = ROOT.'/App/View';
        $this->layoutPath = ROOT.'/App/Template';
        $this->layout = 'default';
    }

    public function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getModel($model_name);
    }

}