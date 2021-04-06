<?php

session_start();
include('db.php');

if(isset($_GET['action'])){
 $action = $_GET['action'];
}else {
    $action = ""; //Vrf tom?
}


if( isset($action) && $action =="update" ){

    $id = $_SESSION['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET Username=:username_IN, email_IN, password_IN WHERE ID=:id_IN";
    $stm = $pdo->prepare( $sql );

    $stm-> bindParam('id_IN', $id);
    $stm-> bindParam('username_IN', $username);
    $stm-> bindParam('email_IN', $email);
    $stm-> bindParam('password_IN', $password);


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
$stm->execute();

if(!$stm->execute()){
    echo "Ops! Kunde inte uppdatera info!";
   die();
} 

$stm->fetch();


?>




<!-- Själva formen med möjlighet att ändra-->
<form method="POST" action="editUser.php?action=update"> 
<input type ="hidden" name ="id" value="<?=$_GET['id']?>">
<br>
<button><a href="entries.php">Starsida</a></button>
<button><a href="index.php">Logga ut</a></button> <br>
<h2>Uppdatera här  <?php echo $_SESSION ['username']?>:</h2>
<br><br>

Username:<br> <!-- ['username']? Från databas-tabellen eller form? -->
<input type = "text" name = "username" placeholder = "<?php echo $_SESSION ['username']?>" /> <br> 
Email:<br>
<input type = "text" name = "email" value = "<?php echo $email;?>"  /> <br>

Password:<br>
<input type = "text" name = "password" value = "<?php echo $password;?>"/> <br><br>

<input type = "submit" name = "update" value = "Uppdatera!">