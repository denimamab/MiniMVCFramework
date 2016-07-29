<?php
namespace App\Model;

use Core\Model\Model;

class PostModel extends Model{

    /**
     * all() method override
     * inject categories module
     * SELECT all post with their category matching
     * @return mixed
     */
    public function all()
    {
        return $this->db->query(' SELECT     p.*, 
                                             c.title as category,
                                             CONCAT(u.firstname, " ", u.lastname ) as author
                                      FROM post p 
                                      LEFT JOIN category c 
                                        ON p.category_id = c.id
                                      LEFT JOIN user u 
                                        ON p.author_id = u.id',
            $this->entity
        );
    }


    /**
     * @param $author_id
     * @return mixed
     */
    public function allByAuthor($author_id)
    {
        return $this->db->prepare(' SELECT p.*, 
                                             c.title as category,
                                             CONCAT(u.firstname, " ", u.lastname ) as author
                                      FROM post p 
                                      LEFT JOIN category c 
                                        ON p.category_id = c.id
                                      LEFT JOIN user u 
                                        ON p.author_id = u.id
                                       WHERE p.author_id = ?',
            $this->entity, [$author_id]
        );
    }

    /**
     * GET all posts in category given
     * @param $id
     * @return mixed
     */
    public function category($id){
        return $this->db->prepare(' SELECT p.*, 
                                             c.title as category
                                      FROM post p 
                                      LEFT JOIN category c ON p.category_id = c.id
                                      WHERE p.category_id = ? ',
            $this->entity,
            [$id]
        );
    }

    /**
     * GET post matching to id given
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->db->prepare('SELECT post.*,
                                          category.title AS category
                                  FROM post
                                  LEFT JOIN category ON post.category_id = category.id
                                  WHERE post.id = ?',
                                  $this->entity,
                                  [$id],
                                  true
        );
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
        $this->db->prepare('INSERT INTO '. $this->table .' ('. $keys .', date) VALUES ('. $sql .',NOW())', $this->entity, $values);
    }

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


}