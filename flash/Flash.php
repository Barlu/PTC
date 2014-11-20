<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Flash
 *
 * @author emmett.newman
 */
class Flash {
    const FLASHES_KEY = '_flashes';

    private static $flashes = null;

    private static function init() {
        if (self::$flashes !== null) {
            return self::$flashes;
        }
        if (!array_key_exists(self::FLASHES_KEY, $_SESSION)) {
            $_SESSION[self::FLASHES_KEY] = [];
        }
        self::$flashes = &$_SESSION[self::FLASHES_KEY];
    }
    
    public static function hasFlashes(){
        self::init();
        return count(self::$flashes)>0;
    }
    
    public static function getFlashes(){
        self::init();
        $copy = self::$flashes;
        self::$flashes = [];
        return $copy;
    }
    
    public static function addFlash($message){
        if(!strlen(trim($message))){
            throw new Exception('Cannot insert empty flash message.');  
        }
        self::init();
        self::$flashes[] = $message; 
    }
}
