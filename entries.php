

<?php
//länk till upplägg för databasen
session_start();
include('db.php');


if(isset($_SESSION['username'])) {
    echo "<h1> Välkommen " . $_SESSION['username'] . "! </h1>";
    // echo $_SESSION['password'];
    echo '<button><a href="editUser.php">Edit Profile</a></button>';
    echo '<button><a href="index.php">Logout</a></button> <br><br>';
} else { 
    echo "Vänligen logga in igen <a href='login.php'>login</a> <br>";
     die();
  }

?>


<form method="POST" action="handleComment.php">
Kommentera här <?php echo $_SESSION ['username']?>:
<br>
<textarea name = "comment"></textarea><br><br>
<input type = "submit" name = "submit-comment" value = "Skicka!">

<br>
<br>
<br>
<form method="POST" action="handleRemove.php">
Ta bort ditt meddelande! <br>
<input type="number" name="id" placeholder="Välj ID-nr">
<input type="submit" value="Ta bort!">
</form> <br><br>

<form method="POST" action="handleEdit.php">
Redigera ditt meddelande! <br>
<input type="number" name="id" placeholder="Välj ID-nr"><br>
<textarea name = "newmessage" placeholder="Nytt meddelande"></textarea><br>
<input type="submit" value="Redigera!" >
</form>


<?php // Skriver ut alla kommentarer, endast inloggade kan se dessa

echo "<h2>Kommentarer!</h2>";


    $stm = $pdo->query('SELECT ID, Username, Comment FROM entries');

    while ($row = $stm->fetch()) {
        echo $row['ID'] . " - " 
        . $row['Username'] . "s " . "kommentar: " . $row['Comment'] . "<br>";       
    }

?>


