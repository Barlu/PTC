<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogIn
 *
 * @author emmett.newman
 */
class LogIn {
    private $id;
    private $username;
    private $password;
    private $userId;
    
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }


}
