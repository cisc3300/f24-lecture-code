<?php

use app\controllers\AuthController;
use app\controllers\MainController;

$routes = [
    'login-form' => [
        'controller' => AuthController::class,
        'GET' => 'loginView'
    ],
    'register-form' => [
        'controller' => AuthController::class,
        'GET' => 'registerView'
    ],
    'register' => [
        'controller' => AuthController::class,
        'POST' => 'register'
    ],
    'login' => [
        'controller' => AuthController::class,
        'POST' => 'login'
    ],
    'logout' => [
        'controller' => AuthController::class,
        'POST' => 'logout'
    ],
    'app-data' => [
        'controller' => MainController::class,
        'GET' => 'appData'
    ]
];