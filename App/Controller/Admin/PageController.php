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
        $this->init();
        $styles = $this->styles;
        $scripts = $this->scripts;

        if($_POST)
        {
            $this->Page->update($_GET['id'], $_POST);
        }
        $item = $this->Page->find($id);
        $form = new BootstrapForm($item);
        $this->render('admin.page.edit', compact('item','form', 'styles', 'scripts'));
    }

    public function create(){
        $form = new BootstrapForm($_POST);
        if($_POST)
        {
            $this->Page->create([   'title'     =>  $_POST['title'],
                                    'content'   =>  $_POST['content']
                                ]);
            header('Location: '. URI .'admin/page');
            die();
        }
        $this->init();
        $styles = $this->styles;
        $scripts = $this->scripts;
        $this->render('admin.page.create',compact('form', 'styles', 'scripts'));

    }

    public function delete(){
        if($_POST)
        {
            $this->Page->delete($_POST['id']);
            header('Location: '. URI .'admin/page');
            die();
        }
    }
}