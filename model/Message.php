<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author emmett.newman
 */
class Message {
    private $id;
    private $senderId;
    private $receiverId;
    private $title;
    private $message;
    private $dateTime;
    private $status;
    
    public function getId() {
        return $this->id;
    }

    public function getSenderId() {
        return $this->senderId;
    }

    public function getReceiverId() {
        return $this->receiverId;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function setSenderId($senderId) {
        $this->senderId = $senderId;
    }

    public function setReceiverId($receiverId) {
        $this->receiverId = $receiverId;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;
    }

    public function setStatus($status) {
        $this->status = $status;
    }


}
