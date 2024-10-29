<?php

namespace app\controllers;

use Exception;
use Error;

function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    echo "<b>Custom error:</b> [$errno] $errstr<br>";
    echo " Error on line $errline in $errfile<br>";
}

class ErrorController
{

    public function viewErrors()
    {
        $title = 'View Errors';
        set_error_handler("app\controllers\myErrorHandler");
        //parse error
        //echo 'Find an error";

        //
//        $price = 7;
//        $quantity = 'five';
//        $total = $price * $quantity;

        try {
//            $price = 7;
//            $quantity = 'five';
//            $total = $price * $quantity;
            if (true) {
                throw new Exception('Division by zero.');
            }
        } catch (Error $e) {
            echo 'Caught error';
        }


        include './assets/views/errors/errors.php';
    }
}