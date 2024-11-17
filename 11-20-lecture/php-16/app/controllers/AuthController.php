<?php

namespace app\controllers;

use app\core\AuthHelper;
use app\models\User;

class AuthController extends Controller {

    public function loginView() {
        AuthHelper::nonAuthRoute();
        $this->returnView('./assets/views/auth/login.html');
    }

    public function registerView() {
        AuthHelper::nonAuthRoute();
        $this->returnView('./assets/views/auth/register.html');
    }

    public function login() {
        $inputData = [
            'email' => $_POST['email'] ? $_POST['email'] : false,
            'password' => $_POST['password'] ? $_POST['password'] : false,
        ];

        $user = new User();
        $authedUser = $user->login(
            [
                'email' => $inputData['email'],
                'password' => $inputData['password'],
            ]
        );

        AuthHelper::startSession($authedUser);

        http_response_code(200);
        $this->returnJSON([
            'route' => '/'
        ]);
    }

    public function logout() {
        AuthHelper::endSession();
        http_response_code(200);
        $this->returnJSON([
            'route' => '/login'
        ]);
    }

    public function register(){
        //validate user

        $inputData = [
            'firstName' => $_POST['firstName'] ? $_POST['firstName'] : false,
            'lastName' => $_POST['lastName'] ? $_POST['lastName'] : false,
            'email' => $_POST['email'] ? $_POST['email'] : false,
            'password' => $_POST['password'] ? $_POST['password'] : false,
        ];

        $user = new User();

        //imagine we are validating here

        $user->saveUser(
            [
                'firstName' => $inputData['firstName'],
                'lastName' => $inputData['lastName'],
                'email' => $inputData['email'],
                'password' => $inputData['password'],
            ]
        );

        http_response_code(200);
        $this->returnJSON([
            'route' => '/login'
        ]);
    }

}