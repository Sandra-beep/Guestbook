<!-- <pre>

<?php

//länk till upplägg för databasen
include('db.php');

$id = $_POST ['ID']; //ID på kommentaren inte userid
$username = $_POST ['username'];
$message = $_POST ['message'];



// hämtar info som user har skrivit in i form
$sql = "INSERT INTO messages (message) VALUES (:message_IN)";
$stm = $pdo->prepare($sql);
// $stm->bindParam(':username_IN', $username);
$stm->bindParam(':message_IN', $message);



//If else som skickar till startsidan entries.php
if($stm->execute()) {
        // header("location:entries.php");
    //
}else{
    echo "Det gick fel!";
}


?>

</pre> -->
