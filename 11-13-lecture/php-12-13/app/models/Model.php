<?php

namespace app\models;

use PDO;
use PDOException;

abstract class Model {

    public function findAll() {
        $query = "select * from $this->table";
        return $this->query($query);
    }

    private function connect() {

        $type = 'mysql';
        $port = '8889';
        $charset = 'utf8mb4';

//        $dsn = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        $dsn = "$type:hostname=" . DBHOST .";dbname=" . DBNAME . ";port=$port;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            //set the default fetch type
            //PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,/
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO($dsn, DBUSER, DBPASS, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }

    }

    public function fetch($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        //no params, one row
        return $statementObject->fetch();
    }

    public function fetchAll($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        //no params, multiple rows
        return $statementObject->fetchAll();
    }

    public function fetchAllWithParams($query, $data = []) {
        $connection = $this->connect();
        //prepare statement -
        $statementObject = $connection->prepare($query);
        $successOrFail = $statementObject->execute($data);
        if ($successOrFail) {
            $result = $statementObject->fetchAll(\PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

}