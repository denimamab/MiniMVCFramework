<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class TestimonyController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Testimony');
    }

    public function index(){
        $items = $this->Testimony->all();
        $this->render('admin.testimony.index', compact('items'));
    }

    public function edit($id){
        if($_POST)
        {
            $this->Testimony->update($_GET['id'], $_POST);
        }
        $item = $this->Testimony->find($id);
        $form = new BootstrapForm($item);
        $this->render('admin.testimony.edit', compact('item','form'));
    }

    public function create(){
        $form = new BootstrapForm($_POST);
        if($_POST)
        {
            $this->Testimony->create([  'author'    =>  $_POST['author'],
                                        'link'   =>  $_POST['link'],
                                        'content'   =>  $_POST['content']
                                ]);
            header('Location: index.php?p=admin.testimony.index');
        }
        $this->render('admin.testimony.create',compact('form'));

    }

    public function delete(){
        if($_POST)
        {
            $this->Testimony->delete($_POST['id']);
            header('Location: index.php?p=admin.testimony.index');
        }
    }
}