<?php

namespace app\core;

use app\controllers\MainController;

class Router
{
    public $routeList;
    function __construct($routes)
    {
        $this->routeList = $routes;
    }

    public function serveRoute() {
        $uriParse = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $method =  $_SERVER['REQUEST_METHOD'];
        $preQuery = explode('?', $uriParse[0]);
        if ($preQuery[0]) {
            $route = $this->routeList[$preQuery[0]] ?? null;
            if ($route) {
                if(isset($route['controller']) && isset($route[$method])) {
                    $controller = $route['controller'];
                    $action = $route[$method];
                    $controller = new $controller();
                    $controller->$action();
                } else {
                    $homepageController = new MainController();
                    $homepageController->notFound();
                }
            } else {
                $homepageController = new MainController();
                $homepageController->notFound();
            }
        } else {
            $homepageController = new MainController();
            $homepageController->homepage();
        }
    }
}