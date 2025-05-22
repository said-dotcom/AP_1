<h1>Mise à jour du mot de passe</h1>
<form method="post" action="envoieDatabase.php" >
Nouveau mot de passe : <input type="password" name="newpassword"><br>
<input type="submit">
</form>

<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

   // Rediriger vers page3 si tu veux continuer
    // header("Location: page3.php");
    // exit;
} else {
    echo "Aucun email reçu.";
}

?>
