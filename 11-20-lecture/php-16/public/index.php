<?php

require_once '../app/core/init.php';

require_once '../app/core/routes.php';

$env = parse_ini_file('../.env');
require '../app/core/config.php';

use app\core\Router;

//to add a new route add to the app/core/routes.php array
$router = new Router($routes);
$router->serveRoute();
?>

