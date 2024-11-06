<?php

namespace app\core;

use PDO;
use PDOException;

trait Database
{

    private function connect()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $dsn = "mysql:hostname=".DBHOST.";dbname=".DBNAME;

        try {
            return new PDO($dsn, DBUSER,DBPASS, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }

    //no params, one row
    public function fetch($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        return $statementObject->fetch();
    }

    //no params, all rows
    public function fetchAll($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        return $statementObject->fetchAll();
    }

    //parms, will execute and return results
    public function queryWithParams($query, $data, $className = null) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->prepare($query);
        $statementObject->execute($data);

        if ($className) {
            $statementObject->setFetchMode(PDO::FETCH_CLASS, $className);
        }

        $result = $statementObject->fetchAll();
        if (is_array($result) && count($result)) {
            return $result;
        }
        http_response_code(400);
        return false;
    }

}


