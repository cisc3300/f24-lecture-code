<?php

namespace app\controllers;

use Exception;
use Error;

function myErrorHandler($errno, $errstr, $errfile, $errline) {
//    echo "<b>Custom error:</b> [$errno] $errstr<br>";
//    echo " Error on line $errline in $errfile<br>";
    echo 'my error handler called';
    exit();
}

class ErrorController {

    public function viewErrors() {
//        parse error

        try {
//        echo 'Find an error";

//            $price = 7;
//            $quantity = 'five';
//            $price * $quantity;
            if (true) {
                throw new Exception('Custom error message!');
            }
        } catch (Error $e) {
            echo 'Caught error';
        }

        //set a custom function for errors
        set_error_handler("app\controllers\myErrorHandler");
        trigger_error('');

    }
}