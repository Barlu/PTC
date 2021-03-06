<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MentorDao
 *
 * @author emmett.newman
 */
class MentorDao extends Dao{
    public function insert($object) {
        $now = new DateTime;
        $object->setId(null);
        $sql = 'INSERT INTO mentor
                VALUES(:id, :userId, :name, :relationship);';
        
        return $this->execute($sql, $object);
    }

    public function update($object){
        $sql = '
            UPDATE mentor
            SET name = :name, relationship = :relationship
            WHERE userId = :userId';
               
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
            ':id' => $object->getId(null),
            ':userId' => $object->getUserId(),
            ':name' => $object->getName(),
            ':relationship' => $object->getRelationship()
        ];
        
        return $params;
    }
    
    public function findById($id) {
        $row = $this->query('
                SELECT * 
                FROM mentor
                WHERE id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $object = new Mentor();
        Mapper::mapMentor($object, $row);
        return $object;
    }
    
    public function delete($id) {
        $sql = '
            DELETE *
            FROM mentor
            WHERE id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':id' => $id,
        ));
        return $statement->rowCount() == 1;
    }
}