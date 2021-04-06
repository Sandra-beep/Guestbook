
<?php
include ("db.php");

$id = $_POST['id'];

// För att radera alla kommentarer som hör till den här usern
$stm = $pdo->prepare("DELETE FROM entries where ID=$id");


if($stm-> execute()){
    header('location:entries.php');
} else {
    echo "Något gick fel!";
}