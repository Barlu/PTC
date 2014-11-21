<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mentor
 *
 * @author emmett.newman
 */
class Mentor {
    private $id;
    private $userId;
    private $name;
    private $relationship;
    
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getName() {
        return $this->name;
    }

    public function getRelationship() {
        return $this->relationship;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setRelationship($relationship) {
        $this->relationship = $relationship;
    }
    
}
