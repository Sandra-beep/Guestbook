

<?php
//länk till upplägg för databasen
session_start();
include('db.php');

if(isset($_SESSION['username'])) {
    echo "<h1> Välkommen " . $_SESSION['username'] . "! </h1>";
    // echo $_SESSION['password'];
    echo '<h4><button><a href="index.php">Logout</a></h4></button> <br>';
} else { 
    echo "Vänligen logga in igen <a href='login.php'>login</a> <br>";
     die();
  }


?>



<form method="POST" action="handleComment.php">
Kommentera: <br>
<textarea name="comment" placeholder="Skriv kommentar här!"cols="35" rows="10"></textarea> <br><br>
<input type="submit" name= "submit-comment" value="Skicka!">
</form>

<br>
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


<?php // Skriver ut alla kommentarer, endast inloggade kan se dessa

echo "<h2>Kommentarer!</h2>";


// Variablar som definerar?


// Plockar upp info från db
$stm = $pdo->query('SELECT entries.ID, users.Username, entries.Message 
FROM entries
JOIN users
ON users.ID=entries.userID');
$stm->execute();
$return = $stm->fetch();

//echoa ut 
while ($row = $stm->fetch()) {
    echo $row['ID'] . " " . $row['Username'] . " " . $row['Message'] . "<br />";
} 
?>


