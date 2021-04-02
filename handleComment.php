<pre>

<?php

session_start();
// länk till upplägg för databasen
include('db.php');

$username = $_SESSION ['username'];
$password = $_SESSION ['password'];
$message = $_POST ['message'];
// $ID = $userID?

// Väljer först ut ID från users tabellen
$sql_Select= "SELECT ID FROM users WHERE Username=:username_IN AND Password=:password_IN";
$statement = $pdo->prepare($sql_Select);
$statement>bindParam(":username_IN", $username);
$statement->bindParam(":password_IN", $password);
$statement->execute();
$userID = $statement->fetch(); //varför userID?

// Lägger in meddelande som en user har skrivit in i form
$sql_Insert = "INSERT INTO entries (userID, Message) VALUES (:userID_IN, :message_IN)";
$stm = $pdo->prepare($sql_Insert);
$stm->bindParam(':userID_IN', $userID[0]); //userID kommer här!
$stm->bindParam(':message_IN', $message);


// If else som skickar till startsidan entries.php
if($stm->execute()) {
        header("location:entries.php");
}else{
    echo "Något gick fel!";
}


?>

</pre>