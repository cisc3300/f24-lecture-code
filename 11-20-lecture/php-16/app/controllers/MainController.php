<?php

namespace app\controllers;

use app\core\AuthHelper;
use app\models\User;

class MainController
{

    public function homepage()
    {
        AuthHelper::authRoute();
        include '../public/assets/views/main/homepage.html';
        exit();
    }

    public function notFound()
    {
        echo 'not found';
    }

    public function appData() {
        AuthHelper::authRoute();

        if (isset($_SESSION['id'])) {
            $userModel = new User();
            $user = $userModel->getUserByID($_SESSION['id']);
            http_response_code(200);
            echo json_encode([
                'currentUser' => [
                    'firstName' => $user['firstName'],
                    'lastName' => $user['lastName'],
                    'email' => $user['email'],
                ]
            ]);
            exit();
        }

        http_response_code(500);
        echo json_encode([
            'error' => 'something happened'
        ]);
        exit();
    }

}