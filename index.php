<?php

//länk till upplägg för databasen
include('db.php');

?>


<h2>Jag är ny här</h2>

<pre>
<form method ="POST" action="handleSignup.php">
    Användarnamn:
    <input type="text" placeholder="Användarnamn här" name = "username"><br>
    Email:
    <input type="text" placeholder="Email här" name = "email"> <br>
    Lösenord:
    <input type="password" placeholder="Lösenord här" name = "password"> <br>
    <input type="submit" value="Registrera!"/>
</form>
</pre>

<h2>Välkommen tillbaka! <br> Logga in här!</h2>

<pre>
<form method ="POST" action="handleLogin.php">
    Användarnamn:
    <input type="text" placeholder="Användarnamn här" name = "username">

    Lösenord:
    <input type="password" placeholder="Lösenord här" name = "password"> <br><br>
    <input type="submit" value="Logga in!"/>
</form>
</pre>


