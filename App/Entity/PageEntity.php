<?php

namespace App\Entity;

use Core\Entity\Entity;

class PageEntity extends Entity{

    /**
     * Trancate content
     * @return string
     */
    public function getExtract(){
        if(strlen($this->content)>200 )
            $extrait =  substr($this->content,0,200) . '...';
        else
            $extrait = $this->content;
        return $extrait;
    }

}