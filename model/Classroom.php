<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Classroom
 *
 * @author emmett.newman
 */
class Classroom {
    private $id;
    private $schoolId;
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

    public function getSchoolId() {
        return $this->schoolId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSchoolId($schoolId) {
        $this->schoolId = $schoolId;
    }


}
