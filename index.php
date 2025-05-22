<?php
session_start();
if (isset($_POST['send_deco']))
{
    echo "deconnexion reussie";
    session_destroy();
}

?>
<link rel="stylesheet" href="index.css" />
<form method="post" action="accueil.php">
login : <input type="text" name="login"><br>
mot de passe : <input type="password" name="mdp"><br>
<input type="submit" name="send_con" vaue="OK"><br>
</form>

<a href ="oubli.php"> oubli de mot de passe </a>
