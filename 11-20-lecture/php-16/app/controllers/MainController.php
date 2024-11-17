<?php

namespace app\controllers;

use app\core\AuthHelper;
use app\models\User;

class MainController extends Controller {

    public function homepage() {
        AuthHelper::authRoute();
        $this->returnView('./assets/views/main/homepage.html');
    }

    public function notFound() {
        $this->returnView('./assets/views/notFound.html');
    }

    public function appData() {
        AuthHelper::authRoute();

        if (isset($_SESSION['id'])) {
            $userModel = new User();
            $user = $userModel->getUserByID($_SESSION['id']);
            http_response_code(200);
            $this->returnJSON([
                'currentUser' => [
                    'firstName' => $user['firstName'],
                    'lastName' => $user['lastName'],
                    'email' => $user['email'],
                ]
            ]);
        }

        http_response_code(500);
        $this->returnJSON([
            'error' => 'something happened'
        ]);
    }

}