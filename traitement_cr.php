<?php
include("_conf.web.php");
session_start();
$date = $_SESSION['date'];
echo "la date du $date";
$description = $_POST['description'];
echo $description;
$erreur = '';

if (empty($date) || empty($description)) {
    $erreur = "Tous les champs doivent être remplis !";
}
if ($connexion = mysqli_connect('','u937355202_BouziteSaid','Bouzi3255&','u937355202_BouziteSaidBDD')){
    echo 'felicitations pour la connexion à la base de donnée';
}
else {
    echo 'erreur de de connexion de la base de donnée'; 
}

// Vérifier si un compte rendu existe déjà pour cette date
$sql_check = "SELECT date FROM cr WHERE date = '$date'";
$result = mysqli_query($connexion, $sql_check);

if (mysqli_num_rows($result) > 0) {
    // Il existe : on met à jour
    $sql_update = "UPDATE cr SET description = '$description' WHERE date = '$date'";
    if (mysqli_query($connexion, $sql_update)) {
        echo "Compte rendu mis à jour.";
    } else {
        echo "Erreur lors de la mise à jour : " . mysqli_error($conn);
    }
} else {
    // Il n'existe pas : on l'insère
    $sql_insert = "INSERT INTO cr (date, description) VALUES ('$date', '$description')";
    if (mysqli_query($connexion, $sql_insert)) {
        echo "Nouveau compte rendu créé.";
    } else {
        echo "Erreur lors de l'insertion : " . mysqli_error($connexion);
    }
}

?>
