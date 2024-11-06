<?php

namespace app\models;

//using the database class namespace
use app\core\Database;

class User
{
    //using the trait, bring in all of its methods
    use Database;

    public function getAllUsersByName($name) {
        $query = "select * from users WHERE CONCAT(firstName,' ',lastName) like :name";

        return $this->queryWithParams($query, ['name' => '%' . $name . '%'], 'app\models\User');
    }

    public function getAllUsers() {
        $query = "select * from users";
        return $this->fetchAll($query);
    }

    public function getUserById($id){
        $query = "select * from users where id = :id";
        return $this->queryWithParams($query, ['id' => $id]);
    }

    public function saveUser($inputData){
        $query = "insert into users (firstName, lastName) values (:firstName, :lastName);";
        return $this->queryWithParams($query, $inputData);
    }

    public function updateUser($inputData){
        $query = "update users set firstName = :firstName, lastName = :lastName where id = :id";
        return $this->queryWithParams($query, $inputData);
    }

    public function deleteUser($inputData){
        $query = "DELETE FROM users where id = :id";
        return $this->queryWithParams($query, $inputData);
    }
}