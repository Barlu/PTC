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
class CommentDao {
    public function insert($object) {
        $sql = 'INSERT INTO comments
                VALUES(null, :uploadId, :comment);';
    
        return $this->execute($sql, $object);
    }

    public function save($object){
        if ($object->getId() === null){
            return $this->insert($object);
        }
    }

    public function getParams($object) {
        $params = [
            ':uploadId' => $object->getId(),
            ':comment' => $object->getComment()
        ];
        return $params;
    }
    
    public function findAllBySenderId($id) {
        $row = $this->query('
                SELECT uploads.id, uploads.senderId, uploads.receiverId, uploads.filePath, uploads.dateTime, uploads.status, comments.message
                FROM uploads LEFT JOIN comments
                ON uploads.senderId = ' . (int) $id . 'AND uploads.id = comments.uploadId')->fetch();
        if (!$row) {
            return null;
        }
        $object = new Upload();
        Mapper::map($object, $row);
        return $object;
    }
    
    public function findAllByReceiverId($id) {
        $row = $this->query('
                SELECT uploads.id, uploads.senderId, uploads.receiverId, uploads.filePath, uploads.dateTime, uploads.status, comments.message
                FROM uploads LEFT JOIN comments
                ON uploads.receiverId = ' . (int) $id . 'AND uploads.id = comments.uploadId' )->fetch();
        if (!$row) {
            return null;
        }
        $object = new FlightBooking();
        Mapper::map($object, $row);
        return $object;
    }
    
    public function delete($id) {
        $sql = '
            UPDATE uploads
            SET status = :status
            WHERE id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':id' => $id,
            ':status' => 'DELETED'
        ));
        return $statement->rowCount() == 1;
    }
}

