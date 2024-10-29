<?php
require_once "../app/controllers/ErrorController.php";

use app\controllers\ErrorController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');

if ($uri === '/errors') {
    $errorController = new ErrorController();
    $errorController->viewErrors();
}
