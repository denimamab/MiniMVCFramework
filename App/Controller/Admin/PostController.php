<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class PostController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index(){
        $items = $this->Post->all();
        $this->render('admin.post.index', compact('items'));
    }

    public function edit($id){
        if($_POST)
        {
            $this->Post->update($_GET['id'], $_POST);
        }
        $item = $this->Post->find($id);
        $form = new BootstrapForm($item);
        $this->render('admin.post.edit', compact('item','form'));
    }

    public function create(){
        $form = new BootstrapForm($_POST);
        if($_POST)
        {
            $this->Post->create([   'title'     =>  $_POST['title'],
                                    'content'   =>  $_POST['content']
                                ]);
            header('Location: index.php?p=admin.post.index');
        }
        $this->render('admin.post.create',compact('form'));

    }

    public function delete(){
        if($_POST)
        {
            $this->Post->delete($_POST['id']);
            header('Location: index.php?p=admin.post.index');

        }
    }
}