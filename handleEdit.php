<?php


//länk till upplägg för databasen
include('db.php');

$idEdit = $_GET['id'];
$newMessage = $_POST['newmessage'];
$stm = $pdo->query("UPDATE entries SET Comment = '$newmessage' WHERE ID=$idEdit");


if($stm->execute()){
    header("location:entries.php");
} else {
    echo "Ops! Kunde inte uppdatera - försök igen!";
}

?>