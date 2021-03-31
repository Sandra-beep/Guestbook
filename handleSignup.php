<?php

//länk till upplägg för databasen
include('db.php');

// variablar med info från form, med alla "name"
$username = $_POST ['username'];
$email = $_POST ['email'];
$password = $_POST ['password'];

// kryptering av lösenord
$salt = "hejåhå235246369()/=/r6**";
$password = md5($password.$salt);

// Sql och stm variabel där man binder in databasen
$sql = "INSERT INTO users (Username, Email, Password) VALUES (:username_IN, :email_IN, :password_IN)";
$stm = $pdo->prepare($sql);
$stm->bindParam(':username_IN', $username);
$stm->bindParam(':email_IN', $email);
$stm->bindParam(':password_IN', $password);



if($stm->execute()) {
    header("location:index.php");
}else{
    echo "Det gick fel!";
}
?>