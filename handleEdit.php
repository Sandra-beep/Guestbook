<?php


//länk till upplägg för databasen
include('db.php');

$idEdit = $_POST['ID'];
$newMessage = $_POST['newmessage'];
$stm = $pdo->query("UPDATE messages SET message = '$newmessage' WHERE ID=$idEdit");


if($stm->execute()){
    header("location:entries.php");
} else {
    echo "Ops! Något gick fel!";
}

?>