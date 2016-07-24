<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CategoryController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index(){
        $items = $this->Category->all();
        $this->render('admin.category.index', compact('items'));
    }

    public function edit($id){
        if($_POST)
        {
            $this->Category->update($_GET['id'], $_POST);
        }
        $item = $this->Category->find($id);
        $form = new BootstrapForm($item);
        $this->render('admin.category.edit', compact('item','form'));
    }

    public function create(){
        $form = new BootstrapForm($_POST);
        if($_POST)
        {
            $this->Category->create([  'title'    =>  $_POST['title'],
                                ]);
            header('Location: index.php?p=admin.category.index');
        }
        $this->render('admin.category.create',compact('form'));

    }

    public function delete(){
        if($_POST)
        {
            $this->Category->delete($_POST['id']);
            header('Location: index.php?p=admin.category.index');
        }
    }
}