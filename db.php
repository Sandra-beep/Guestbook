

<?php

//upplägg för databaskopplingen
$dsn = "mysql:host=localhost;dbname=guestbook";
$username = "root";
$password = "";

$pdo = new PDO ($dsn, $username, $password);

?>