<?php

namespace App\Model;

use Core\Model\Model;

class UserModel extends Model{

    /**
     * Find user by username given
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return $this->db->prepare('SELECT * FROM  '. $this->table .'  WHERE username = ?', $this->entity, [$username], true);
    }

    public function all()
    {
        return $this->db->prepare('SELECT   u.id          as   id,
                                            u.username    as   username,
                                            u.firstname   as   firstname,
                                            u.lastname    as   lastname,
                                            u.email       as   email,
                                            u.date        as   date,
                                            r.name        as   rank
                                            FROM user u
                                            LEFT JOIN rank r 
                                                ON u.rank = r.id', $this->entity);
    }

    public function create($args)
    {
        $sql = [];
        $values = [];
        foreach ($args as $k => $v)
        {
            $keys[] = $k;
            $sql[] = '?';
            $values[] = $v;
        }
        $sql = implode(',', $sql);
        $keys = implode(',', $keys);
        $this->db->prepare('INSERT INTO '. $this->table .' ('. $keys .',date) VALUES ('. $sql .', NOW())', $this->entity, $values);
    }
}