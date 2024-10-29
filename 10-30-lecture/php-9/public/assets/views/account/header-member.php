<!DOCTYPE html>
<html>
    <body>
        <div class="page">
            <nav>
                <a href="home.php">Home</a>
                <a href="products.php">Products</a>
                <a href="account.php">My Account</a>
                <?= $logged_in ? '<a href="logout.php">Log Out</a>' : '<a href="login.php">Log In</a>'; ?>
            </nav>
            <section>