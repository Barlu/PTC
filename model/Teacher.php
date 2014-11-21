<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teacher
 *
 * @author emmett.newman
 */
class Teacher {
    private $id;
    private $name;
    private $schoolId;
    private $userId;
    private $classroomId;
    
    public function getClassroomId() {
        return $this->classroomId;
    }

    public function setClassroomId($classroomId) {
        $this->classroomId = (int) $classroomId;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getSchoolId() {
        return $this->schoolId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSchoolId($schoolId) {
        $this->schoolId = $schoolId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }


}
