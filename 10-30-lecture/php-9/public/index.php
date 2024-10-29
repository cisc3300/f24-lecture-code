<?php
require_once "../app/models/User.php";
require_once "../app/controllers/AccountController.php";

use app\controllers\AccountController;
use app\controllers\ErrorController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');

if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $accountController = new AccountController();
    $accountController->viewLogin();
}

if ($uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountController = new AccountController();
    $accountController->login();
}

if ($uri === '/logout' ) {
    $accountController = new AccountController();
    $accountController->logout();
}


if ($uri === '/account') {
    $accountController = new AccountController();
    $accountController->viewAccount();
}

if ($uri === '/errors') {
    $errorController = new ErrorController();
    $errorController->viewErrors();
}

if ($uri === '/cookies') {
    include './assets/views/cookies/cookies.php';
}



?>


