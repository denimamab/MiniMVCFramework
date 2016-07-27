<?php

namespace Core\Model;


use Core\Database\Database;

class Model{

    protected $table;
    protected $entity;
    protected $db;

    /**
     * Model constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        if($this->table === null){
            $called_table = get_class($this);
            $called_table = explode('\\',$called_table);
            $called_table = end($called_table);
            $called_table = str_replace('Model','',$called_table);
            $this->table = strtolower($called_table);
        }
        if($this->entity === null){
            $entity = get_class($this);
            $entity = str_replace('Model','Entity',$entity);
            $this->entity = $entity;
        }
        $this->db = $db;
    }

    /**
     * SELECT all entries in the table
     * @return mixed
     */
    public function all()
    {
        return $this->db->query('SELECT * FROM '. $this->table, $this->entity);
    }

    /**
     * SELECT entry matching with id given
     * @param $id
     * @return mixed
     */
    public function find($id){
        return $this->db->prepare(' SELECT * 
                                    FROM ' . $this->table .' 
                                    WHERE id=?',
            $this->entity,
            [$id],
            true);
    }

    /**
     * CRUD
     * @param $id
     * @param $fields
     */

    public function update($id, $fields)
    {
        $SQLStat = [];
        $attrs = [];

        foreach ($fields as $k => $v){
            $SQLStat[] = ' ' . $k . '=?';
            $attrs[] = $v;
        }
        $SQL = implode(',', $SQLStat);
        $attrs[] = $id;

        $this->db->prepare('UPDATE '. $this->table .' SET ' . $SQL . ' WHERE id=?', $this->entity, $attrs);
    }

    public function delete($id)
    {
        $this->db->prepare('DELETE FROM '. $this->table .'  WHERE id=?', $this->entity, [$id]);
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
        $this->db->prepare('INSERT INTO '. $this->table .' ('. $keys .') VALUES ('. $sql .')', $this->entity, $values);
    }

}