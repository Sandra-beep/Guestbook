

<?php
//länk till upplägg för databasen
session_start();
echo "<h1> Välkommen " . $_SESSION['username'] . "! </h1><br>";
// echo $_SESSION['password'];
echo '<h4><button><a href="index.php">Logout</a></h4></button>';


include('db.php');

?>




<form method="POST" action="handleComment.php">
Kommentera: <br>
<textarea name="message" placeholder="Skriv kommentar här!"cols="35" rows="10"></textarea> <br><br>
<button type="submit" name="skicka" id="skicka" value="Skicka!">Skicka!</button>
</form>

<br>
<br>


<form method="POST" action="handleRemove.php">
Ta bort ditt meddelande! <br>
<input type="number" name="ID" placeholder="Välj ID-nr">
<input type="submit" value="Ta bort!">
</form> <br><br>

<form method="POST" action="handleEdit.php">
Redigera ditt meddelande! <br>
<input type="number" name="ID" placeholder="Välj ID-nr">
<input type="submit" value="Redigera!" >
</form>


<?php 

echo "<h2>Kommentarer!</h2>";


$stm = $pdo->query('SELECT entries.ID, users.Username, entries.Message 
FROM entries
JOIN users
ON users.ID=entries.userID');
$stm->execute();
$return = $stm->fetch();


// while($row = $stm->fetch()){
//     echo "<br>" 
//     . $row ['ID'] . $_SESSION['username'] . $row ['Message'] . "<br>";
// }

if( $return[0] > 0 ){
    $_SESSION ['username'] = $username;
    $_SESSION ['message'] = $message;

    header ("location:entries.php");
} else {
    echo "Fel uppgifter";
}

?>