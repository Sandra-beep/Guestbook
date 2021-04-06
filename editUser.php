<?php

session_start();
include('db.php');

// Get-variabeln action från form
$action = $_GET['action'];
$id = $_GET['id'];

if(isset($_GET['action'])){
 $action = $_GET['action'];
}else {
    $action = ""; //Vrf tom?
}


if( isset($action) && $action =="update" ){
    $sql = "UPDATE users SET Username=:username_IN, email_IN, password_IN WHERE ID=:id_IN";
    $stm = $pdo->prepare( $sql );
    $stm-> bindParam('username_IN', $_POST['username']);
    $stm-> bindParam('email_IN', $_POST['email']);
    $stm-> bindParam('password_IN', $_POST['password']);
    $stm-> bindParam('id_IN', $_POST['id']);

    if ( $stm->execute() ){
        header('location:editUser.php');
        echo "Sweet! Nu är allt uppdaterat!";
    } else {
        echo "Kunde inte uppdaterat!";
        die();
    }
} 

// Hämtar användare från databasen, tabellen users
$stm = $pdo->prepare('SELECT ID, Username, Email, Password FROM users WHERE ID=:id_IN');
$stm->bindParam(":id_IN", $id);

if(!$stm->execute()){
    echo "Ops! Kunde inte uppdatera info!";
   die();
} 

$userData = $stm->fetch();

?>

<!-- Själva formen med möjlighet att ändra-->
<form method="POST" action="editUser.php?action=update"> 
<input type ="hidden" name ="id" value="<?=$_GET['id']?>">
<h2>Uppdatera dina uppgifter här  <?php echo $_SESSION ['username']?>:</h2>
<button><a href="entries.php">Starsida</a></button>
<button><a href="index.php">Logga ut</a></button> <br><br><br>

Username:<br> <!-- ['username']? Från databas-tabellen eller form? -->
<input type = "text" name = "username" value = "<?=$userdata['Username']?>" /> <br> 
Email:<br>
<input type = "text" name = "email" value = "<?=$userdata['Email']?>"  /> <br>
Password:<br>
<input type = "text" name = "password" value = "<?=$userdata['Password']?>"/> <br><br>

<input type = "submit" name = "submit" value = "Uppdatera!">