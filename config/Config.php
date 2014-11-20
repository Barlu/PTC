<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author emmett.newman
 */
class Config {
    private static $data = null;
    
    public static function getConfig($section = null) {
        if ($section === null) {
            return self::getData();
        }
        $data = self::getData();
        if (!array_key_exists($section, $data)) {
            throw new Exception('Unknown config section: ' . $section);
        }
        return $data[$section];
    }
    
    private static function getData() {
        if(self::$data !== null){
            return self::$data;
        }
            self::$data = parse_ini_file('../config/config.ini', true);
            return self::$data;
        
    }


}
