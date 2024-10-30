<?php
require_once "../app/controllers/ErrorController.php";

use app\controllers\ErrorController;

$errorController = new ErrorController();
$errorController->viewErrors();
