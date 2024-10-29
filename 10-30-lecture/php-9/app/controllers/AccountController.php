<?php

namespace app\controllers;

class AccountController {

    public function viewLogin() {
        include '../app/core/sessions.php';
        include './assets/views/account/login.php';
    }

    public function viewOther(){
        include './assets/views/account/other.php';
    }

    public function viewAccount() {
        include '../app/core/sessions.php';
        include './assets/views/account/account.php';
    }

    public function logout() {
        include '../app/core/sessions.php';
        logout();
    }

    public function login() {
        require '../app/core/sessions.php';
        $user_email    = $_POST['email'];          // Email user sent
        $user_password = $_POST['password'];       // Password user sent

        if ($user_email == $email and $user_password == $password) { // If details correct
            login();                               // Call login function
            header('Location: account');       // Redirect to account page
            exit;                                  // Stop further code running
        }
    }

}