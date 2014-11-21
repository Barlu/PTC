<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author emmett.newman
 */
class Upload {
    private $id;
    private $senderId;
    private $receiverId;
    private $title;
    private $dateTime;
    private $filePath;
    private $status;
    private $comment;
    
    public function getId() {
        return $this->id;
    }

    public function getSenderId() {
        return $this->senderId;
    }

    public function getReceiverId() {
        return $this->receiverId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function getFilePath() {
        return $this->filePath;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getComment() {
        return $this->comment;
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

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;
    }

    public function setFilePath($filePath) {
        $this->filePath = $filePath;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }


}
