<?php
$counter = $_COOKIE['counter'] ?? 0;
$counter = $counter + 1;
setcookie('counter', $counter);

$message = 'Page Views:' . $counter;
?>
<h1>Welcome</h1>
<p><?= $message ?></p>
