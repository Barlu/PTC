<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactDao
 *
 * @author emmett.newman
 */
class ContactDao extends Dao {
    public function insert($object) {
        $object->setId(null);
        $sql = 'INSERT INTO contact
                VALUES(:id, :userId, :address, :primaryPhone, :email, :DOB);';
        
        return $this->execute($sql, $object);
    }

    public function update($object){
        $sql = '
            UPDATE contact
            SET address = :address, primaryPhone = :primaryPhone, email = :email, DOB = :DOB
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
            ':userId' => $object->getUserId(),
            ':address' => $object->getAddress(),
            ':primaryPhone' => $object->getPrimaryPhone(),
            ':email' => $object->getEmail(),
            ':DOB' => $object->getDOB()  
        ];
        
        return $params;
    }
    
    public function findById($id) {
        $row = $this->query('
                SELECT * 
                FROM contact
                WHERE id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $object = new FlightBooking();
        Mapper::map($object, $row);
        return $object;
    }
    
    public function delete($id) {
        $sql = '
            DELETE *
            FROM contact
            WHERE id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':id' => $id
        ));
        return $statement->rowCount() == 1;
    }
}
