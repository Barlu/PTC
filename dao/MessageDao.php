<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageDao
 *
 * @author emmett.newman
 */
class MessageDao extends Dao{
    public function insert($object) {
        $now = new DateTime;
        $object->setId(null);
        $object-setDateTime($now->getTimestamp());
        $sql = 'INSERT INTO messages
                VALUES(:id, :senderId, :receiverId, :title, :message, :dateTime, :status);';
        return $this->execute($sql, $object);
    }

    public function update($object){
        $sql = '
            UPDATE messages
            SET title = :title, message = :message, status = :status
            WHERE id = :id';
        return $this->execute($sql, $object);
    }
    public function save($object){
        if ($object->getId() === null){
            return $this->insert($object);
        }
        return $this->update($object);

    }

    private function getParams($object) {
        $params = [
            ':id' => $object->getId(),
            ':senderId' => $object->getSenderId(),
            ':receiverId' => $object->getReceiverId(),
            ':title' => $object->getTitle(),
            ':message' => $object->getMessage(),
            ':dateTime' => $object->getDateTime(),
            ':status' => $object->getDateTime()
        ];
        return $params;
    }
    
    public function findAllBySenderId($id) {
         $result = [];
         foreach($this->query('
                SELECT * 
                FROM messages
                WHERE senderId = ' . (int) $id)->fetch() as $row){
             $message = new Message();
             Mapper::mapMessage($object, $row);
             $result[$message->getDateTime()] = $row;
         }
        return $result;
    }
    
    public function findAllByReceiverId($id) {
        $result = [];
         foreach($this->query('
                SELECT * 
                FROM messages
                WHERE receiverId = ' . (int) $id)->fetch() as $row){
             $message = new Message();
             Mapper::mapMessage($object, $row);
             $result[$message->getDateTime()] = $row;
         }
        return $result;
    }
    
    public function delete($id) {
        $sql = '
            UPDATE messages
            SET satus
            WHERE senderId = :senderId';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':senderId' => $id
        ));
        return $statement->rowCount() == 1;
    }
}
