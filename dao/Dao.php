<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlightBookingDao
 *
 * @author emmett.newman
 */
class Dao {

    private $db = null;

    public function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        $config = Config::getConfig("db");
        try {
            $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
        } catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        return $this->db;
    }
    
    public function execute($sql, $object) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($object));
        if (!$object->getId()) {
            return $this->findById($this->getDb()->lastInsertId());
        }
        if (!$statement->rowCount()) {
            throw new NotFoundException('Object with ID "' . $object->getId() . '" does not exist.');
        }
        return $object;
    }

    public function executeStatement(PDOStatement $statement, array $params) {
        if (!$statement->execute($params)) {
            self::throwDbError($this->getDb()->errorInfo());
        }
    }
    
    public function query($sql) {
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        return $statement;
    }

    public function __destruct() {
        $this->db = null;
    }
    
    public static function throwDbError(array $errorInfo) {
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }
    
    public static function formatDateTime(DateTime $dateTime) {
        $dateTime->format(DateTime::ISO8601);
        return $dateTime;
    }

}
