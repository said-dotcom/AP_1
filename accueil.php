<?php 
session_start();
if (isset($_POST['send_con']))
{
    include "_conf.web.php";
     // Recup des données du formulaire
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
        // Hachage du mot de passe
    $mdp=md5($mdp);
    
        // inclurde fichier conf
   
      // Co à la base de données
    if($connexion=mysqli_connect($server,$user,$pwd,$bdd))
    {
        $requete="Select * from utilisateur WHERE login='$login' and motdepasse='$mdp'";

            $resultat = mysqli_query($connexion, $requete);
            $trouve=0;
            while($donnees = mysqli_fetch_assoc($resultat))
            { 
                $trouve=1;
                  // récupération des valeurs de la base de données pour création de variable de session afin de réutiliser dans les autres pages
                $_SESSION['Snum'] = $donnees['num'];
                $_SESSION['Slogin'] = $donnees['login'];
                $_SESSION['Soption'] = $donnees['option'];
                

            }
            if ($trouve==1)
            {
                echo"connexion réussie ";
            }
            else {
                echo"login/mdp pas trouvé";
            }
    }


// SI JAI UNE VARIABLE DE SESSION
if (isset($_SESSION['Snum']))
{
    echo "toujours connecté en tant que ".$_SESSION['Slogin'];
    echo "<br> <a href='perso.php'>Lien vers mes infos perso</a>";
?>
    <form method="post" action="index.php">
    <input type="submit" value="déconnexion" name="send_deco">
    </form>

    <?php
    // PARTIE PROF
    if ($_SESSION['Soption']==1)
    {
        echo "<hr> PARTIE PROF";

        ?>
        <li><a href="liste_eleves.php">Liste des eleves</a></li>
        <li><a href="liste_comptesrendus.php"> Liste des comptes rendus</a></li>
        <?php

    }

    // PARTIE ELEVE
    else { 
        echo "<hr> PARTIE ELEVE";
    }
}

echo " Bienvenue " .$_SESSION['Slogin'];  
?>



<?php


}

?>


<div class="menu">
            <ul>
                <li><a href="creer_comptesrendus.php">Créer/modifier un compte rendu</a></li>
                <li><a href="liste_comptesrendus.php"> Liste des comptes rendus</a></li>
                <li><a href="commentaires.php">Commentaires</a></li>
            </ul>
        </div>


