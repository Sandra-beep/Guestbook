
<?php

session_start();
include('db.php'); //länk till databasen

// Definera variablarna
$userID = $_SESSION['ID']; //hämta ID från user
$username = $_SESSION['username'];
$comment = $_POST['comment'];

//Lägg in meddelande som en user har skrivit in i form
$sqli = "INSERT INTO entries (userID, Username, Comment) VALUES (:id_IN, :username_IN, :comment_IN)";
$stm = $pdo->prepare($sqli);
$stm->bindParam(':id_IN', $userID);
$stm->bindParam(':username_IN', $username);
$stm->bindParam(':comment_IN', $comment);
// execute eller fetch här???


// If else som tar en till startsidan
if($stm->execute()){
    header('location:entries.php');
}else{
    echo "Något gick fel!";
}

