<?php
session_start();
$monEmail = $_SESSION['email'];
// je récup l'info qui est tapé par l'utilisateur au clavie r
$newpassword = $_POST ['newpassword'];
$newpassword=md5($newpassword);
if ($connexion = mysqli_connect('localhost','root','','projet_said')){
    echo 'le mot de passe a été mis à jour';
}
else {
    echo 'erreur de de connexion de la base de donnée'; 
}
$requete="Update utilisateur SET motdepasse = '$newpassword' WHERE email = '$monEmail'";
if (!mysqli_query($connexion,$requete)) 
{
      echo "<br>Erreur : ".mysqli_error($connexion)."<br>";
}
?>