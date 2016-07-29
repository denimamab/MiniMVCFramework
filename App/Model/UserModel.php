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
        return $this->db->prepare('SELECT   u.id          as   id,
                                            u.username    as   username,
                                            u.firstname   as   firstname,
                                            u.lastname    as   lastname,
                                            u.email       as   email,
                                            u.date        as   date,
                                            u.phone       as   phone,
                                            u.picture     as   picture,
                                            r.name        as   rank,
                                            u.password    as   password
                                            FROM user u
                                            LEFT JOIN rank r 
                                                ON u.rank = r.id
                                            WHERE username = ?', $this->entity, [$username], true);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->db->prepare('SELECT   u.id          as   id,
                                            u.username    as   username,
                                            u.firstname   as   firstname,
                                            u.lastname    as   lastname,
                                            u.email       as   email,
                                            u.date        as   date,
                                            u.picture     as   picture,
                                            u.phone       as   phone,                                           
                                            r.name        as   rank
                                            FROM user u
                                            LEFT JOIN rank r 
                                                ON u.rank = r.id
                                            WHERE u.id = ?', $this->entity, [$id], true);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->db->prepare('SELECT   u.id          as   id,
                                            u.username    as   username,
                                            u.firstname   as   firstname,
                                            u.lastname    as   lastname,
                                            u.email       as   email,
                                            u.date        as   date,
                                            u.phone       as   phone,                                           
                                            r.name        as   rank
                                            FROM user u
                                            LEFT JOIN rank r 
                                                ON u.rank = r.id', $this->entity);
    }

    /**
     * @param $args
     */
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