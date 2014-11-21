<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author emmett.newman
 */
class Admin {
    private $id;
    private $schoolId;
    private $userId;
    private $name;
    
    public function getId() {
        return $this->id;
    }

    public function getSchoolId() {
        return $this->schoolId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSchoolId($schoolId) {
        $this->schoolId = $schoolId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setName($name) {
        $this->name = $name;
    }

}
