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

    private function init()
    {
        $this->style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css');
        $this->style('froala/css/froala_editor.min.css');
        $this->style('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css');
        $this->style('froala/css/plugins/char_counter.css');
        $this->style('froala/css/plugins/code_view.css');
        $this->style('froala/css/plugins/colors.css');
        $this->style('froala/css/plugins/emoticons.css');
        //$this->style('froala/css/plugins/file.css');
        $this->style('froala/css/plugins/fullscreen.css');
        $this->style('froala/css/plugins/image.css');
        $this->style('froala/css/plugins/image_manager.css');
        $this->style('froala/css/plugins/line_breaker.css');
        $this->style('froala/css/plugins/quick_insert.css');
        $this->style('froala/css/plugins/table.css');
        $this->style('froala/css/plugins/video.css');

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
        $this->script('froala/js/plugins/font_family.min.js');
        $this->script('froala/js/plugins/font_size.min.js');
        $this->script('froala/js/plugins/fullscreen.min.js');
        $this->script('froala/js/plugins/image.min.js');
        $this->script('froala/js/plugins/image_manager.min.js');
        $this->script('froala/js/plugins/inline_style.min.js');
        $this->script('froala/js/plugins/line_breaker.min.js');
        $this->script('froala/js/plugins/link.min.js');
        $this->script('froala/js/plugins/lists.min.js');
        $this->script('froala/js/plugins/paragraph_format.min.js');
        $this->script('froala/js/plugins/paragraph_style.min.js');
        $this->script('froala/js/plugins/quick_insert.min.js');
        $this->script('froala/js/plugins/quote.min.js');
        $this->script('froala/js/plugins/table.min.js');
        $this->script('froala/js/plugins/save.min.js');
        $this->script('froala/js/plugins/url.min.js');
        $this->script('froala/js/plugins/video.min.js');
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
            header('Location: index.php?p=admin.post.index');
        }
        $this->render('admin.post.create',compact('form','styles','scripts'));

    }

    public function delete(){
        if($_POST)
        {
            $this->Post->delete($_POST['id']);
            header('Location: index.php?p=admin.post.index');

        }
    }
}