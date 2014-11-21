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
    public static function mapUser(User $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        if(array_key_exists('role', $params)){
            $object->setRole($params['role']);
        }
        return $object;
    }
    
    public static function mapSchool(School $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        if(array_key_exists('name', $params)){
            $object->setName($params['name']);
        }
        if(array_key_exists('address', $params)){
            $object->setAddress($params['address']);
        }
        return $object;
    }
    
    public static function mapStudent(Student $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        if(array_key_exists('name', $params)){
            $object->setName($params['name']);
        }
        if(array_key_exists('classroomId', $params)){
            $object->setClassroomId($params['classroomId']);
        }
        if(array_key_exists('schoolId', $params)){
            $object->setSchoolId($params['schoolId']);
        }
        if(array_key_exists('userId', $params)){
            $object->setUserId($params['userId']);
        }
        if(array_key_exists('status', $params)){
            $object->setStatus($params['status']);
        }
        return $object;
       
    }
    
    public static function mapMentor(Mentor $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        if(array_key_exists('name', $params)){
            $object->setName($params['name']);
        }
        if(array_key_exists('relationship', $params)){
            $object->setRelationship($params['relationship']);
        }
        if(array_key_exists('userId', $params)){
            $object->setUserId($params['userId']);
        }
        return $object;
    }
    
    public static function mapMessage(Message $object, array $params){
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
        if(array_key_exists('message', $params)){
            $object->setMessage($params['message']);
        }
        if(array_key_exists('dateTime', $params)){
            $object->setDateTime($params['dateTime']);
        }
        if(array_key_exists('status', $params)){
            $object->setStatus($params['status']);
        }
        return $object;
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
    
    public static function mapTeacher(Teacher $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        if(array_key_exists('name', $params)){
            $object->setName($params['name']);
        }
        if(array_key_exists('classroomId', $params)){
            $object->setClassroomId($params['classroomId']);
        }
        if(array_key_exists('schoolId', $params)){
            $object->setSchoolId($params['schoolId']);
        }
        if(array_key_exists('userId', $params)){
            $object->setUserId($params['userId']);
        }
        if(array_key_exists('status', $params)){
            $object->setStatus($params['status']);
        }
        return $object;
    }
    
    public static function mapContact(Contact $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        if(array_key_exists('address', $params)){
            $object->setAddress($params['address']);
        }
        if(array_key_exists('primaryPhone', $params)){
            $object->setPrimaryPhone($params['primaryPhone']);
        }
        if(array_key_exists('email', $params)){
            $object->setEmail($params['email']);
        }
        if(array_key_exists('DOB', $params)){
            $object->setDOB($params['DOB']);
        }
    }
    
    public static function mapLogIn(LogIn $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        
        if(array_key_exists('userId', $params)){
            $object->setUserId($params['userId']);
        }
        
        if(array_key_exists('username', $params)){
            $object->setUsername($params['username']);
        }
        
        if(array_key_exists('password', $params)){
            $object->setPassword($params['password']);
        }
    }
    
    public static function mapAdmin(Admin $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        
        if(array_key_exists('userId', $params)){
            $object->setUserId($params['userId']);
        }
        
        if(array_key_exists('schoolId', $params)){
            $object->setSchoolId($params['schoolId']);
        }
        
        if(array_key_exists('name', $params)){
            $object->setName($params['name']);
        }
        return $object;
    }
    
    public static function mapClassroom(Classroom $object, array $params){
        if(array_key_exists('id', $params)){
            $object->setId($params['id']);
        }
        
        if(array_key_exists('classNumber', $params)){
            $object->setClassNumber($params['classNumber']);
        }
        
        if(array_key_exists('schoolId', $params)){
            $object->setSchoolId($params['schoolId']);
        }
        return $object;
    }
}
