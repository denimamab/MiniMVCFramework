<?php

namespace App\Controller\Admin;


class AdminController extends AppController
{

    public function index()
    {
        $root = $this->isRootAuthorized();
        $this->render('admin.index', compact('root'));
    }
    
    
}