<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminDao
 *
 * @author emmett.newman
 */
class AdminDao {
    public function insert($object) {
        $object->setId(null);
        $sql = 'INSERT INTO admin
                VALUES(:id, :schoolId, :userId, :name);';
        
        return $this->execute($sql, $object);
    }

    public function update($object){
        $sql = '
            UPDATE admin
            SET schoolId = :schoolId, name = :name
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
            ':id' => $object->getId(),
            ':schoolId' => $object->getSchoolId(),
            ':userId' => $object->getUserId(),
            ':name' => $object->getName()
        ];
        
        return $params;
    }
    
    public function findById($userId) {
        $row = $this->query('
                SELECT * 
                FROM teacher
                WHERE userId = ' . (int) $userId)->fetch();
        if (!$row) {
            return null;
        }
        $object = new Admin();
        Mapper::mapAdmin($object, $row);
        return $object;
    }
    
    public function delete($userId) {
        $sql = '
            DELETE all
            FROM admin
            WHERE userId = :userId';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':userId' => $userId,
        ));
        return $statement->rowCount() == 1;
    }
}
