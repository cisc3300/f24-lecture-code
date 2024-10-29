<?php
// **PREVENTING SESSION HIJACKING**
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);

// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);

// Uses a secure connection (HTTPS) if possible
ini_set('session.cookie_secure', 1);

// Start/renew session and set cookie
session_start();

// Is user logged in?
$logged_in = $_SESSION['logged_in'] ?? false;

//validation will come here
$email     = 'test@test.com';
$password  = 'test';

function login() {
    // Update session id
    session_regenerate_id(true);
    // Set logged_in key to true on the session
    $_SESSION['logged_in'] = true;
}

// Terminate the session
function logout() {
    // Clear contents of the session array
    $_SESSION = [];

    // Get session cookie parameters
    $params = session_get_cookie_params();
    // Delete session cookie
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'],
        $params['secure'], $params['httponly']);

    // Delete session file
    session_destroy();
    // Send to login page
    header('Location: login');
}

function require_login($logged_in) {
    // Check if user logged in
    // If not logged in
    if ($logged_in == false) {
        // Send to login page
        header('Location: login');
        // Stop rest of page running
        exit();
    }
}
