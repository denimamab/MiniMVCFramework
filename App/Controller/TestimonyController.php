<?php

namespace App\Controller;

class TestimonyController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Testimony');
    }

    /**
     * GET all testimonials
     */
    public function index()
    {
        $items = $this->Testimony->all();
        $this->render('testimony.index',compact('items'));
    }

    /**
     * GET testimony matching to id given
     * @param $id
     */
    public function single($id)
    {
        $item = $this->Testimony->find($id);
        if($item)
            $this->render('testimony.single', compact('item'));
        else
            $this->notFound();
    }


}