<?php

namespace App\Controller;

class PageController extends AppController{


    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Page');
    }

    /**
     * GET all pages
     */
    public function index()
    {
        $items = $this->Page->all();
        $this->render('page.index',compact('items'));
    }

    /**
     * GET page matching with id given
     * @param $id
     */
    public function single($id)
    {
        $item = $this->Page->find($id);
        if($item)
            $this->render('page.single', compact('item'));
        else
            $this->notFound();
    }


}