
<?php
session_start();
include 'db.php';

$idEdit = $_GET['id'];

// För att radera alla kommentarer som hör till den här usern
$stm = $pdo->prepare("DELETE FROM comments where ID=" . $_GET['id']);
$stm-> execute();
