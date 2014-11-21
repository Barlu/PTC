<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentDao
 *
 * @author emmett.newman
 */
class CommentDao extends Dao{
    public function insert($object) {
        $sql = 'INSERT INTO comments
                VALUES(null, :uploadId, :comment);';
        return $this->execute($sql, $object);
    }

    public function save($object){
            return $this->insert($object);
    }

    public function getParams($object) {
        $params = [
            ':uploadId' => $object->getId(),
            ':comment' => $object->getComment()
        ];
        return $params;
    }

}

