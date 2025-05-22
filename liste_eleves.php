<?php
session_start();
include "_conf.web.php";
$connexion = mysqli_connect('','u937355202_BouziteSaid','Bouzi3255&','u937355202_BouziteSaidBDD');

if ($connexion) {
    echo "connexion réussie";
} else {
    echo "connexion échoué";
}




$eleve_num = 1;
// liste des CR pour eleves

    $query = "SELECT num, prenom, nom FROM utilisateur WHERE type = 1 ORDER BY prenom, nom";
    $result = mysqli_query($connexion, $query);


    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['num'] . " - " . $row['prenom'] . " " . $row['nom'] . "<br>";
        }
    } else {
        echo "Erreur dans la requête : " . mysqli_error($conexion);
    }

?>

















