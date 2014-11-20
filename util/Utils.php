<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author emmett.newman
 */
class Utils {
    public static function createLink($page, array $params = array()){
        $params = array_merge(array('page' => $page), $params);
        return 'index.php?'.http_build_query($params);
    }
    
    public static function redirect($page, array $params = array()){
        header('Location:'.self::createLink($page,$params));
        die();
    }
    
    public static function escape($string){
        return htmlspecailchars($string, ENT_QUOTES);
    }
    
    public static function getUrlParam($name){
        if(!array_key_exists($name, $_GET)){
            throw new NotFoundException('URL parameter "'.$name.'" not found');
        }else{
            return $_GET[$name];
        }
    }
}
