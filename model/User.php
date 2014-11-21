<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author emmett.newman
 */
class User {
    private $id;
    private $role;
    
    public function getId() {
        return $this->id;
    }

    public function getRole() {
        return $this->role;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRole($role) {
        $this->role = $role;
    }


}
