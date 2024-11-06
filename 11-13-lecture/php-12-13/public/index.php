<?php
require_once "../app/core/Database.php";
require_once "../app/models/User.php";
require_once "../app/controllers/UserController.php";

//set our env variables
$env = parse_ini_file('../.env');
require '../app/core/config.php';

use app\controllers\UserController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);
//0 = ""
//1 = users
//2 = 1


//get all or a single user
if ($uriArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $userController = new UserController();
    $userController->getUsers($id);
}

//save user
if ($uri === '/users' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();
    $userController->saveUser();
}

//update user
if ($uriArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $userController = new UserController();
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $userController->updateUser($id);
}

//delete user
if ($uriArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $userController = new UserController();
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $userController->deleteUser($id);
}

//views
if ($uri === '/users-view' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController = new UserController();
    $userController->usersView();
}

if ($uri === '/users-add-view' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController = new UserController();
    $userController->usersAddView();
}

if ($uriArray[1] === 'users-update-view' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController = new UserController();
    $userController->usersUpdateView();
}

if ($uriArray[1] === 'users-delete-view' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController = new UserController();
    $userController->usersDeleteView();
}

include '../public/assets/views/notFound.html';

?>


