<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mapper
 *
 * @author emmett.newman
 */
class Mapper {
    public static function mapSchool(School $object, array $array){
        
    }
    
    public static function mapStudent(Student $object, array $array){
        
    }
    
    public static function mapMentor(Mentor $object, array $array){
        
    }
    
    public static function mapMessage(Message $object, array $array){
        
    }
    
    public static function mapUpload(Upload $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        if(array_key_exists('senderId', $params)){
            $object->setSenderId($params['senderId']);
        }
        if(array_key_exists('receiverId', $params)){
            $object->setReceiverId($params['receiverId']);
        }
        if(array_key_exists('title', $params)){
            $object->setTitle($params['title']);
        }
        if(array_key_exists('dateTime', $params)){
            $object->setDateTime($params['dateTime']);
        }
        if(array_key_exists('filePath', $params)){
            $object->setFilePath($params['filePath']);
        }
        if(array_key_exists('status', $params)){
            $object->setStatus($params['status']);
        }
        if(array_key_exists('comment', $params)){
            $object->setComment($params['comment']);
        }
        return $object;     
    }
    
    public static function mapTeacher(Teacher $object, array $array){
        
    }
    
    public static function mapContact(Contact $object, array $array){
        
    }
    
    public static function mapLogIn(LogIn $object, array $array){
        
    }
}
