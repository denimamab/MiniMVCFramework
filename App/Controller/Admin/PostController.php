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
        $styles = $this->styles;
        $scripts = $this->scripts;
        $items = $this->Post->all();
        $this->render('admin.post.index', compact('items'));
    }

    public function edit($id){
        if($_POST)
        {
            $this->Post->update($_GET['id'], $_POST);
        }
        $this->init();
        $styles = $this->styles;
        $scripts = $this->scripts;

        $item = $this->Post->find($id);
        $form = new BootstrapForm($item);
        $this->render('admin.post.edit', compact('item','form','scripts','styles'));
    }

    public function create(){
        $this->init();
        $styles = $this->styles;
        $scripts = $this->scripts;

        $form = new BootstrapForm($_POST);
        if($_POST)
        {
            $this->Post->create([   'title'     =>  $_POST['title'],
                                    'content'   =>  $_POST['content']
                                ]);
            header('Location: '. URI .'admin/post/');
            die();
        }
        $this->render('admin.post.create',compact('form','styles','scripts'));

    }

    public function delete(){
        if($_POST)
        {
            $this->Post->delete($_POST['id']);
            header('Location: '. URI .'admin/post/');
            die();
        }
    }
}