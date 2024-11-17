<?php

namespace app\models;

class User extends Model {

    public function updateUserSessionExp($inputData){
        $query = "update users set sessionExpiration = :sessionExpiration where id = :id";
        return $this->query($query, $inputData);
    }

    public function saveUser($inputData) {
        $inputData['password'] = password_hash($inputData['password'], PASSWORD_DEFAULT);
        $query = "insert into users (firstName, lastName, email, password) values (:firstName, :lastName, :email, :password);";

        return $this->query($query, $inputData);
    }

    public function getUserByID($id) {
        $query = "SELECT id, firstName, lastName, email, sessionExpiration  
                  FROM users 
                 WHERE id = :id;";                         // SQL to get member data
        $user = $this->query($query, ['id' => $id]);    // Run SQL
        if (!$user) {                                          // If no member found
            return false;                                        // Return false
        }
        return $user[0];
    }

    public function login($inputData) {
        $query = "SELECT id, firstName, lastName, email, password 
                  FROM users 
                 WHERE email = :email;";                         // SQL to get member data
        $member = $this->query($query, ['email' => $inputData['email']]);    // Run SQL
        if (!$member) {                                          // If no member found
            return false;                                        // Return false
        }

        $authenticated = password_verify($inputData['password'], $member[0]['password']); // Passwords match?
        return ($authenticated ? $member[0] : false);
    }

}