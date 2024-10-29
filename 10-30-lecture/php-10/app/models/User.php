<?php

namespace app\models;

class User
{
    public function getAllUsersByName($name) {
        //in future this will come from the database

        $allUsers = [
            [
                'id' => '1',
                'name' => 'pinecone'
            ],
            [
                'id' => '2',
                'name' => 'nathan'
            ]
        ];

        return array_filter($allUsers, function ($user) use ($name) {
            if ($user['name'] === $name) {
                return $user;
            };
        });

        return $filteredByName;
    }

    public function saveUsers() {

    }
}