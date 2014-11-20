<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogInDao
 *
 * @author emmett.newman
 */
class LogInDao extends Dao {
    public function insert($object) {
        $object->setId(null);
        $sql = 'INSERT INTO logIn
                VALUES(:id, :userId, :userName, :password);';
        
        return $this->execute($sql, $object);
    }

    public function update($object){
        $sql = '
            UPDATE logIn
            SET userName = :userName, password = :password
            WHERE logIn.userId = :userId';
               
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
            ':userId' => $object->getUserId(),
            ':userName' => $object->getUserName(),
            ':password' => $object->getPassword()
        ];
        
        return $params;
    }
    
    public function findById($id) {
        $row = $this->query('
                SELECT *
                FROM logIn
                WHERE id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $object = new LogIn();
        Mapper::map($object, $row);
        return $object;
    }
    
    public function delete($id) {
        $sql = '
            DELETE * 
            FROM logIn
            WHERE id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            'id:' => $id
        ));
        return $statement->rowCount() == 1;
    }
}