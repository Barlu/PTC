<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StundentDao
 *
 * @author emmett.newman
 */
class StundentDao extends Dao {
    public function insert($object) {
        $object->setId(null);
        $object->setStatus('ACTIVE');
        $sql = 'INSERT INTO student
                VALUES(:id, :schoolId, :classroomId, :userId, :name, :status);';
        
        return $this->execute($sql, $object);
    }

    public function update($object){
        $sql = '
            UPDATE student
            SET schoolId = :schoolId, classroomId = :classroomId, name = :name
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
            ':schoolId' => $object->getSchoolId(),
            ':classroomId' => $object->getClassroomId(),
            ':name' => $object->getName(),
            ':userId' => $object->getUserId(),
            ':status' => $object->getStatus()
        ];
        
        return $params;
    }
    
    public function findById($id) {
        $row = $this->query('
                SELECT * 
                FROM student
                WHERE id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $object = new Student();
        Mapper::mapStudent($object, $row);
        return $object;
    }
    
    public function findAllByClassroomId($id) {
        $results = [];
        foreach($this->query('
                SELECT * 
                FROM student
                WHERE classroomId = ' . (int) $id) as $row){
            $student = new Student();
            Mapper::mapStudent($student, $row);
            $results[] = $student;
        }
        return $results;
    }
    
    public function delete($id) {
        $sql = '
            UPDATE student
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
