<?php

use \app\core\AuthHelper;

//require our files, remember should be relative to index.php
require '../app/core/Router.php';
require '../app/models/Model.php';
require '../app/controllers/Controller.php';
require '../app/controllers/MainController.php';
require '../app/controllers/AuthController.php';
require '../app/models/User.php';
require '../app/core/AuthHelper.php';


//set up env variables
$env = parse_ini_file('../.env');

define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBDRIVER', '');

//set up other configs
define('DEBUG', true);

$session = AuthHelper::checkSession();