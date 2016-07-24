<?php

namespace App\Controller;

class AuthController extends AppController{

    public function login()
    {
        /**
         * Manage logged and none logged users
         */
        $this->render('auth.login');
    }
}