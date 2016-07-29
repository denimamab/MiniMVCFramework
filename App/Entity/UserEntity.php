<?php

namespace App\Entity;

use Core\Entity\Entity;

class UserEntity extends Entity{

    public function getAvatar()
    {
        $s = 150;
        $d = 'identicon';
        $r = 'g';

        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $this->email ) ) );
        $url .= "?s=$s&d=$d&r=$r";

        return $url;
    }
}