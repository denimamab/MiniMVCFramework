<?php

namespace App\Entity;

use Core\Entity\Entity;

class TestimonyEntity extends Entity{

    /**
     * Trancate content
     * @return string
     */
    public function getExtract(){
        if(strlen($this->content)>100 )
            $extrait =  substr($this->content,0,100) . '...';
        else
            $extrait = $this->content;
        return $extrait;
    }

}