<?php

if ($logged_in) {                              // If already logged in
    header('Location: account');           // Redirect to account page
    exit;                                      // Stop further code running
}

?>
    <h1>Login</h1>
    <form method="POST" action="login">
        Email: <input type="email" name="email"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Log In">
    </form>
