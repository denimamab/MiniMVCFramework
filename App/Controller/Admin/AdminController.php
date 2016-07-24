<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class AdminController extends AppController
{

    public function index()
    {
        $this->render('admin.index');
    }

}