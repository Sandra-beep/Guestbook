<?php

//länk till upplägg för databasen
include('db.php');

$idRemove = $_POST['ID'];
$stm = $pdo->query('DELETE FROM entries WHERE ID=$idRemove');

if($stm->execute()){
    header("location:entries.php");
}else{
    echo "Ops! Något gick fel!";
}

?>