<?php
    include('db.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $salt = "hejåhå235246369()/=/r6**";
    $password = md5($password.$salt);
    

    $stm = $pdo->prepare("SELECT ID FROM users WHERE Username=:username_IN AND Password=:password_IN");
    $stm->bindParam(":username_IN", $username);
    $stm->bindParam(":password_IN", $password);
    $stm->execute();
    $return = $stm->fetch();


    if($return[0] > 0) {

       session_start();
       $_SESSION['username'] = $username;
       $_SESSION['password'] = $password;
       $_SESSION['ID'] = $return['ID'];

       header("location:entries.php");

    } else {
        echo "Fel uppgifter!";
    }
    


?>