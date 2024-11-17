<?php

namespace app\controllers;

abstract class Controller {

    public function returnView($pathToView) {
        require $pathToView;
        exit();
    }

    public function returnJSON($json) {
        header("Content-Type: application/json");
        echo json_encode($json);
        exit();
    }

}