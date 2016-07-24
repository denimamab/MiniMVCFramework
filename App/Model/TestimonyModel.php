<?php
namespace App\Model;

use Core\Model\Model;

class TestimonyModel extends Model{
    public function update($id, $fields)
    {
        $SQLStat = [];
        $attrs = [];

        foreach ($fields as $k => $v){
            $SQLStat[] = ' ' . $k . ' = ?';
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