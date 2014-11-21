<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TeacherDao
 *
 * @author emmett.newman
 */
class TeacherDao extends Dao {
    public function insert($object) {
        $object->setId(null);
        $sql = 'INSERT INTO teacher
                VALUES(:id, :schoolId, :classroomId, :userId, :name, :status);';
        
        return $this->execute($sql, $object);
    }

    public function update($object){
        $sql = '
            UPDATE teacher
            SET schoolId = :schoolId, classroomId = :classroomId, name = :name, status = :status
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
            ':name' => $object->getName(),
            ':classroomId' => $object->classroomId(),
            ':status' => $object->getStatus()   
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
        $object = new Teacher();
        Mapper::mapTeacher($object, $row);
        return $object;
    }
    
    public function delete($userId) {
        $sql = '
            UPDATE teacher
            SET status = :status
            WHERE userId = :userId';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':userId' => $userId,
            ':status' => 'DELETED'
        ));
        return $statement->rowCount() == 1;
    }
}
