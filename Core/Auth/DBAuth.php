<?php

namespace Core\Auth;

use App\App;
use Core\Session\AuthSession;
use Core\Session\Session;

class DBAuth{


    /**
     * @var Session
     */
    private $session;

    public function __construct(AuthSession $session)
    {

        $this->session = $session;
    }

    public function login($username, $password)
    {
        $item = App::getInstance()->User->findByUsername($username);
        if($item)
        {
            if($item->password === sha1($password))
            {
                $this->session->set('user',[    'id' => $item->id,
                                                'firstname' => $item->firstname,
                                                'lastname' => $item->lastname
                                             ]);
                $this->session->set('msg',[
                                            'type'  =>  'success',
                                            'text'  =>  'You are logged in'
                                    ]);
                return true;
            }
        }
        $this->session->set('msg',[
                                'type'  =>  'danger',
                                'text'  =>  'login or password incorrect'
                            ]);
        return false;
    }

    /**
     * @return bool
     */
    public function logged()
    {
        return !empty($this->session->get('user'));

    }

    public function isAdmin()
    {
        $item = App::getInstance()->User->find($this->session->get('user')['id']);

    }
}