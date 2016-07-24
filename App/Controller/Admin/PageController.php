<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class PageController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Page');
    }

    public function index(){
        $items = $this->Page->all();
        $this->render('admin.page.index', compact('items'));
    }

    public function edit($id){
        if($_POST)
        {
            $this->Page->update($_GET['id'], $_POST);
        }
        $item = $this->Page->find($id);
        $form = new BootstrapForm($item);
        $this->render('admin.page.edit', compact('item','form'));
    }

    public function create(){
        $form = new BootstrapForm($_POST);
        if($_POST)
        {
            $this->Page->create([   'title'     =>  $_POST['title'],
                                    'content'   =>  $_POST['content']
                                ]);
            header('Location: index.php?p=admin.page.index');
        }
        $this->render('admin.page.create',compact('form'));

    }

    public function delete(){
        if($_POST)
        {
            $this->Page->delete($_POST['id']);
            header('Location: index.php?p=admin.page.index');
        }
    }
}