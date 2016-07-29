<?php

namespace App\Controller;


use App\App;

class UserController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
        $this->loadModel('Post');
    }

    /**
     * GET User matching to id given
     * @param $id
     */
    public function single($id)
    {
        $item = $this->User->find($id);
        $posts = $this->Post->allByAuthor($id);
        if($item)
            $this->render('user.single', compact('item','posts'));
        else
            $this->notFound();
    }

}