<?php

namespace app\core;

use app\models\User;
use DateTime;
use DateInterval;

class AuthHelper
{
    public static function authRoute() {
        if (!isset($_SESSION['id'])) {
            http_response_code(401);
            header('Location: login');
            exit();
        }
    }

    public static function nonAuthRoute() {
        if (isset($_SESSION['id'])) {
            http_response_code(401);
            header('Location: /');
            exit();
        }
    }

    public static function checkSession() {
        session_start();
        if (isset($_SESSION['id'])) {
            $userModel = new User();
            $user = $userModel->getUserByID($_SESSION['id']);
            $now = new DateTime(); //now
            $formattedCurrentTime = $now->format('Y-m-d H:i:s'); // 2021-09-11 01:01:55
            if ($user['sessionExpiration'] < $formattedCurrentTime) {
                AuthHelper::endSession();
            }
        }
    }

    public static function startSession($user) {
        session_regenerate_id(true);
        $_SESSION['id'] = $user['id'];           // Add member id to session
        $_SESSION['email'] = $user['email'];     // Add forename to session

        //delete session and revoke token if the session is too old
        $now = new DateTime(); //now
        $hours = 4; // hours amount (integer) you want to add
        $modified = (clone $now)->add(new DateInterval("PT{$hours}H"));
        $toString = $modified->format('Y-m-d H:i:s');
        $userModel = new User();
        $user = $userModel->getUserByID($_SESSION['id']);
        $userModel->updateUserSessionExp(['sessionExpiration' => $toString, 'id' => $user['id']]);
    }

    public static function endSession() {
        $_SESSION = [];                                  // Empty $_SESSION superglobal
        $param    = session_get_cookie_params();         // Get session cookie parameters
        setcookie(session_name(), '', time() - 2400, $param['path'], $param['domain'],
            $param['secure'], $param['httponly']);       // Clear session cookie
        session_destroy();
    }

}