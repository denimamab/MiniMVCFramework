<?php

namespace App\Controller;

use App\App;

class PostController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    /**
     * GET all posts
     */
    public function index()
    {
        App::getInstance()->title = 'Posts | ' . App::getInstance()->title;
        $items = $this->Post->all();
        $this->render('post.index',compact('items'));
    }

    /**
     * GET post matching to id given
     * @param $id
     */
    public function single($id)
    {
        $item = $this->Post->find($id);
        if($item)
        {
            App::getInstance()->title = $item->title . ' | ' . App::getInstance()->title;
            $this->render('post.single', compact('item'));
        }
        else
            $this->notFound();
    }

    /**
     * GET all posts matching to category id given
     * @param $id
     */
    public function category($id)
    {
        $items = $this->Post->category($id);
        $category = $this->Category->find($id);
        App::getInstance()->title = $category->title . ' | ' . App::getInstance()->title;
        $this->render('post.category',compact('items', 'category'));
    }

}