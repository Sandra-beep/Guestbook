
<?php

session_start();
include('db.php'); //länk till databasen

// Definera variablarna
$id = $_POST['id']; //ID på kommentaren, inte user
$username = $_SESSION['username'];
$comment = $_POST ['comment'];

//Lägg in meddelande som en user har skrivit in i form
$sqli = "INSERT INTO entries (ID, Username, Comment) VALUES(:id_IN, :username_IN, :comment_IN)";
$stm = $pdo->prepare($sqli);
$stm-> bindParam(':id_IN', $id);
$stm-> bindParam(':username_IN', $username);
$stm-> bindParam(':comment_IN, $comment');
// execute eller fetch här???


// If else som tar en till startsidan
if($stm->execute){
    header('location:entries.php');
}else{
    echo "Något gick fel!";
}

