<?php
session_start();

$login= $_SESSION['Slogin'];
$num_utilisateur = $_SESSION['Snum'];
include "_conf.web.php";

// liste des CR par numéro d'utilisateur
if($connexion=mysqli_connect($server,$user,$pwd,$bdd)){
    $query = "SELECT date, description FROM cr WHERE num_utilisateur = '$num_utilisateur' ORDER BY date DESC";
    $result = mysqli_query($connexion, $query);
    // Vérifier s'il y a des résultats
    if (mysqli_num_rows($result) > 0) {
        // Parcourir chaque ligne de résultat
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Date: " . htmlspecialchars($row['date']) . "<br>";
            echo "Description: " . htmlspecialchars($row['description']) . "<br><br>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
}
// liste de tous les CR
if($connexion=mysqli_connect($server,$user,$pwd,$bdd)){
    $query = "SELECT date, description FROM cr ORDER BY date DESC";
    $result = mysqli_query($connexion, $query);
    // Vérifier s'il y a des résultats
    if (mysqli_num_rows($result) > 0) 
    else { echo "impossibe d'effectuer cette requete";
        // Parcourir chaque ligne de résultat
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Date: " . htmlspecialchars($row['date']) . "<br>";
            echo "Description: " . htmlspecialchars($row['description']) . "<br><br>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }
}

?>