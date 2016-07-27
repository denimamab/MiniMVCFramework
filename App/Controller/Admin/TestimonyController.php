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

    protected function init()
    {
        /*Initialize styles and scripts for edit and create pages*/
        $this->style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css');
        $this->style('froala/css/froala_editor.min.css');
        $this->style('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css');
        $this->style('froala/css/plugins/char_counter.css');
        $this->style('froala/css/plugins/code_view.css');
        $this->style('froala/css/plugins/colors.css');
        $this->style('froala/css/plugins/emoticons.css');
        //$this->style('froala/css/plugins/file.css');
        $this->style('froala/css/plugins/quick_insert.css');

        $this->script('//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js');
        $this->script('froala/js/froala_editor.min.js');
        $this->script('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js');
        $this->script('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js');
        $this->script('froala/js/plugins/align.min.js');
        $this->script('froala/js/plugins/char_counter.min.js');
        $this->script('froala/js/plugins/code_beautifier.min.js');
        $this->script('froala/js/plugins/code_view.min.js');
        $this->script('froala/js/plugins/colors.min.js');
        $this->script('froala/js/plugins/emoticons.min.js');
        $this->script('froala/js/plugins/entities.min.js');
        //$this->script('froala/js/plugins/file.min.js');
        $this->script('froala/js/plugins/inline_style.min.js');
        $this->script('froala/js/plugins/link.min.js');
        $this->script('froala/js/plugins/lists.min.js');
        $this->script('froala/js/plugins/quick_insert.min.js');
        $this->script('froala/js/plugins/url.min.js');
    }

    public function index(){
        $items = $this->Testimony->all();
        $this->render('admin.testimony.index', compact('items'));
    }


    public function edit($id){
        $this->init();
        $scripts = $this->scripts;
        $styles = $this->styles;

        if($_POST)
        {
            $this->Testimony->update($_GET['id'], $_POST);
        }
        $item = $this->Testimony->find($id);
        $form = new BootstrapForm($item);
        $this->render('admin.testimony.edit', compact('item','form', 'styles', 'scripts'));
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
        $this->init();
        $scripts = $this->scripts;
        $styles = $this->styles;

        $this->render('admin.testimony.create',compact('form', 'styles', 'scripts'));

    }

    public function delete(){
        if($_POST)
        {
            $this->Testimony->delete($_POST['id']);
            header('Location: index.php?p=admin.testimony.index');
        }
    }
}