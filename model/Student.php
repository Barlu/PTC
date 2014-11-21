<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author emmett.newman
 */
class Student {
    private $id;
    private $schoolId;
    private $classroomId;
    private $userId;
    private $name;
    private $status;
    
    public function getId() {
        return $this->id;
    }

    public function getSchoolId() {
        return $this->schoolId;
    }

    public function getMentorId() {
        return $this->mentorId;
    }

    public function getClassroomId() {
        return $this->classroomId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getName() {
        return $this->name;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function setSchoolId($schoolId) {
        $this->schoolId = $schoolId;
    }

    public function setMentorId($mentorId) {
        $this->mentorId = $mentorId;
    }

    public function setClassroomId($classroomId) {
        $this->classroomId = $classroomId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setStatus($status) {
        $this->status = $status;
    }


}
