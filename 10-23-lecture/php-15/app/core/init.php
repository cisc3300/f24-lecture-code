<?php
//from where we are, get the directory that's up 3 levels, core = 1, app = 2, root is 3
define('APP_ROOT', dirname(__FILE__, 3));
define('APP_PUBLIC', dirname(__FILE__, 3) . '/public');
define('APP_APP', dirname(__FILE__, 3) . '/app');
define('APP_VIEWS', dirname(__FILE__, 3) . '/public/assets/views');

//we pass it a function with what to do, the classname is automatically passed in

require APP_ROOT .'/app/vendor/autoload.php';

spl_autoload_register(function ($classname) {
    require $filename = APP_ROOT . '/' . str_replace('\\', '/', $classname) . ".php";
});
