<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error
 *
 * @author emmett.newman
 */
class Error {
    private $source;
    private $message;
    
    function __construct($source, $message) {
        $this->source = $source;
        $this->message = $message;
    }
    
    public function getSource() {
        return $this->source;
    }

    public function getMessage() {
        return $this->message;
    }

}
