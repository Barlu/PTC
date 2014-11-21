<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadDao
 *
 * @author emmett.newman
 */
class UploadDao extends Dao {

    public function insert($object) {
        $now = new DateTime();
        $object->setId(null);
        $object->setDateTime($now->getTimestamp());
        $object->setStatus('UNOPENED');
        $sql = 'INSERT INTO uploads
                    VALUES(:id, :senderId, :receiverId, :title, :dateTime, :filePath, :status);';

        return $this->execute($sql, $object);
    }

    public function save($object) {
        if ($object->getId() === null) {
            return $this->insert($object);
        }
    }

    public function getParams($object) {
        $params = [
            ':id' => $object->getId(),
            ':senderId' => $object->getSenderId(),
            ':receiverId' => $object->getReceiverId(),
            ':title' => $object->getTitle(),
            ':dateTime' => $object->getDateTime(),
            ':filePath' => $object->getFilePath(),
            ':status' => $object->getStatus()
        ];
        return $params;
    }

    public function findById($id) {
        $row = $this->query('
                SELECT *
                FROM uploads
                WHERE id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $object = new Upload();
        Mapper::mapUpload($object, $row);
        return $object;
    }

    public function findAllBySenderId($id) {
        $result = [];
        foreach($this->query('
                SELECT uploads.id, uploads.senderId, uploads.receiverId, uploads.filePath, uploads.dateTime, uploads.status, comments.comment
                FROM uploads LEFT JOIN comments
                ON uploads.id = comments.uploadId WHERE uploads.senderId = ' . (int) $id) as $row){
            $upload = new Upload();
            Mapper::mapUpload($upload, $row);
            $result[$upload->getDateTime()] = $upload;
        }
        return $result;
    }

    public function findAllByReceiverId($id) {
        $result = [];
        foreach($this->query('
                SELECT uploads.id, uploads.senderId, uploads.receiverId, uploads.filePath, uploads.dateTime, uploads.status, comments.comment
                FROM uploads LEFT JOIN comments
                ON uploads.id = comments.uploadId WHERE uploads.receiverId = ' . (int) $id) as $row){
            $upload = new Upload();
            Mapper::mapUpload($upload, $row);
            $result[$upload->getDateTime()] = $upload;
        }
        return $result;
    }

    public function delete($id) {
        $sql = '
            UPDATE uploads
            SET status = :status
            WHERE id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':id' => $id,
            ':status' => 'DELETED'
        ));
        return $statement->rowCount() == 1;
    }

}
