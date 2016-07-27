<?php

namespace App\Controller\Admin;


class AdminController extends AppController
{

    public function index()
    {
        $this->render('admin.index');
    }
}