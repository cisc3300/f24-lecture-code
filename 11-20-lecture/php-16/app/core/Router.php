<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\AuthController;

class Router {
    public $urlArray;

    function __construct()
    {
        $this->urlArray = $this->routeSplit();
        $this->handleAuthRoutes();
        $this->handleMainRoutes();
    }

    protected function routeSplit() {
        $removeQueryParams = strtok($_SERVER["REQUEST_URI"], '?');
        return explode("/", $removeQueryParams);
    }

    protected function handleAuthRoutes() {
        if ($this->urlArray[1] === 'login' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $authController = new AuthController();
            $authController->loginView();
        }

        if ($this->urlArray[1] === 'register' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $authController = new AuthController();
            $authController->registerView();
        }

        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController = new AuthController();
            $authController->register();
        }

        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController = new AuthController();
            $authController->login();
        }

        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'logout' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController = new AuthController();
            $authController->logout();
        }
    }

    protected function handleMainRoutes() {
        if ($this->urlArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController = new MainController();
            $mainController->homepage();
        }

        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'app-data' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController = new MainController();
            $mainController->appData();
        }
    }
}