<?php

namespace Core\Database;

use \PDO;

class MySQLDatabase extends Database{

    private $db_name;
    private $db_user;
    private  $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user='root', $db_pass='', $db_host='localhost')
    {
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        $this->db_name = $db_name;
    }

    private function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:dbname='.$this->db_name.';host=localhost;charset=UTF8', $this->db_user,$this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;

    }

    public function query($statement, $class_name, $single=false){
        $db = $this->getPDO();
        $data = $db->query($statement);
        $data->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($single){
            $data = $data->fetch();
        }else{
            $data = $data->fetchAll();
        }
        return $data;

    }

    public function prepare($statement, $class_name, $args=[], $single=false){
        $db = $this->getPDO();
        $req = $db->prepare($statement);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        $res = $req->execute($args);

        if(  strpos($statement,'UPDATE') === 0
            ||  strpos($statement,'INSERT') === 0
            ||  strpos($statement,'DELETE') === 0
        )
            return $res;

        if($single){
            $data = $req->fetch();
        }else{
            $data = $req->fetchAll();
        }
        return $data;

    }

}