<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author emmett.newman
 */
class Contact {
    private $id;
    private $userId;
    private $address;
    private $primaryPhone;
    private $email;
    private $DOB;
    
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPrimaryPhone() {
        return $this->primaryPhone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDOB() {
        return $this->DOB;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPrimaryPhone($primaryPhone) {
        $this->primaryPhone = $primaryPhone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDOB($DOB) {
        $this->DOB = $DOB;
    }


}
