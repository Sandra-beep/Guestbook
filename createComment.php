<!-- ALTERNATIV 2  -->
<?php

include('db.php');


$id = $_POST['id'];
$username = $_SESSION['username'];
$message = $_POST['message'];


$sql = "INSERT INTO entries(Message) VALUES(:message_IN)";
$stm = $pdo->prepare($sql);
$stm->bindParam(':message_IN', $message);

if($stm->execute()) {
    header("location:entries.php");
} else {
    echo "Det gick fel!";
}
​​​​

?>