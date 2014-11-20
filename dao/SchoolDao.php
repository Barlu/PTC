<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SchoolDao
 *
 * @author emmett.newman
 */
class SchoolDao extends Dao {
    public function insert($object) {
        $now = new DateTime;
        $object->setId(null);
        $sql = 'INSERT INTO 
                VALUES();';
        
        return $this->execute($sql, $object);
    }

    public function update($object){
        $sql = '
            UPDATE 
            SET   
            WHERE';
               
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
            
        ];
        
        return $params;
    }
    
    public function findById($id) {
        $row = $this->query('
                SELECT * 
                FROM 
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
            UPDATE 
            SET
            WHERE id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            
        ));
        return $statement->rowCount() == 1;
    }
}