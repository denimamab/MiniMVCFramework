<?php

namespace App\Controller\Admin;

use App\App;
use Core\HTML\BootstrapForm;

class UserController extends AppController
{
    protected $ControlSession;
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
        $this->ControlSession = App::getInstance()->getControlSession();
    }

    protected function isAuthorized()
    {
      return $this->isRootAuthorized();
    }

    public function index(){
        $items = $this->User->all();
        $this->render('admin.user.index', compact('items'));
    }

    public function edit($id){
        $msgs = [];

        if($_POST)
        {
            $statement = [  'firstname'     =>  $_POST['firstname'],
                            'lastname'      =>  $_POST['lastname'],
                            'email'         =>  $_POST['email'],
                            'phone'         =>  $_POST['phone']
            ];
            $msgs[] = [ 'type'  =>  'success',
                        'text'  =>  'Account informations successfully updated'];
            $passwordArray = [];
            if(!empty($_POST['newPassword']) || !empty($_POST['confirmPassword']))
            {
                if($_POST['newPassword'] === $_POST['confirmPassword'])
                {
                    $passwordArray  = ['password' => sha1($_POST['newPassword'])];
                    $msgs[] = [ 'type'  =>  'success',
                                'text'  =>  'Password successfully updated'];
                }
                else
                    $msgs[] = [ 'type'  =>  'danger',
                                'text'  =>  'Password not updated, confirmation incorrect'];
            }

            $this->ControlSession->set('msgs', $msgs);
            $statement = array_merge($statement,$passwordArray);
            $this->User->update($_GET['id'], $statement);
            if($msgs[1]['type'] != 'danger')
            {
                header('Location: '.URI.'admin/user');
                die();
            }
       }
            $item = $this->User->find($id);
            $form = new BootstrapForm($item);
            $this->render('admin.user.edit', compact('item','form'));
    }

    public function create(){
        $msgs = [];

        $form = new BootstrapForm($_POST);

        if($_POST
            && !empty($_POST['username'])
            && !empty($_POST['email'])
            && !empty($_POST['password'])
            && !empty($_POST['confirmPassword'])
            )
        {
            if($_POST['password'] === $_POST['confirmPassword'])
            {
                $statement = [  'username'      =>  $_POST['username'],
                                'firstname'     =>  $_POST['firstname'],
                                'lastname'      =>  $_POST['lastname'],
                                'email'         =>  $_POST['email'],
                                'phone'         =>  $_POST['phone'],
                                'password'      =>  sha1($_POST['password'])
                ];
                $msgs[] = [ 'type'  =>  'success',
                            'text'  =>  'User successfully created'];
                $this->ControlSession->set('msgs', $msgs);
                $this->User->create($statement);
                header('Location: '.URI.'admin/user');
                die();
            }else{
                $msgs[] = [ 'type'  =>  'danger',
                            'text'  =>  'Password confirmation incorrect'];
                $this->ControlSession->set('msgs', $msgs);
            }
        }
        $this->render('admin.user.create',compact('form'));

    }

    public function delete(){
        if($_POST)
        {
            $this->User->delete($_POST['id']);
            $this->ControlSession->set('msgs', [['type'  =>  'success',
                                                'text'  =>  'User successfully deleted']]);
            header('Location: '.URI.'admin/user');
            die();
        }
    }
}