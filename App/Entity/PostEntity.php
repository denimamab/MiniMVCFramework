<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity{

    /**
     * Trancate content
     * @return string
     */
    public function getExtract(){
        $dom = new \DOMDocument();
        $dom->loadHTML($this->content);
        $xpath = new \DOMXPath($dom);
        $paragraphs = $xpath->query('//p');
        if($paragraphs->length > 0){
            $first_paragraph = $paragraphs->item(0)->nodeValue;
            if(strlen($first_paragraph)>100 )
                $extrait =  substr($first_paragraph,0,100) . '...';
            else
                $extrait = $first_paragraph;
        }
        else
            $extrait = '';
        return $extrait;
    }

}