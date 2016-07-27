<?php

namespace Core\Entity;

class Entity{

    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        $this->$name = $this->$method();
        return $this->$name;
    }

    public function getUrl(){
        $arr = explode('\\', get_class($this));
        $arr = end($arr);
        $url = str_replace('Entity', '', $arr);
        $url = strtolower($url);
        return URI . $url . '/' . $this->id;
    }
}