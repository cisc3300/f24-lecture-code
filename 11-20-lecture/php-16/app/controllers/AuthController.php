<?php

namespace app\controllers;

use app\core\AuthHelper;
use app\models\User;

class AuthController
{

    public function loginView()
    {
        AuthHelper::nonAuthRoute();
        include APP_VIEWS . '/auth/login.html';
        exit();
    }

    public function registerView()
    {
        AuthHelper::nonAuthRoute();
        include APP_VIEWS . '/auth/register.html';
        exit();
    }

    public function login()
    {
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
        echo json_encode([
            'route' => '/'
        ]);
        exit();
    }

    public function logout()
    {
        AuthHelper::endSession();
        http_response_code(200);
        echo json_encode([
            'route' => '/login-form'
        ]);
        exit;
    }

    public function register()
    {
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
        echo json_encode([
            'route' => 'login-form'
        ]);
        exit();
    }

}