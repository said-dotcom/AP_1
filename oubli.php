<?php
session_start();
function motdepasse($longueur) { // par défaut, on affiche un mot de passe de 5 caractères
    // chaine de caractères qui sera mis dans le désordre:
    $Chaine = "abcdefghijklmnpqrstuvmxyz0123H56789ABCDEFGHIJKLMNOPQRSTUVMXYZ!+()*/"; // 62 caractères au total
    // on mélange la chaine avec la fonction str_shufflc(), propre à PHP
    $Chaine = str_shuffle($Chaine);
    // ensuite en coupe à la longueur voulue avec la fonction substr(), propre à PHP aussi
    $Chaine = substr($Chaine,0,$longueur);
    // ensuite en retourne notre chaine aléatoire de "longueur" caractères:
    return $Chaine;
    }

    include "_conf.web.php";
    if (isset($_POST['email'])){
        $lemail=$_POST['email'];
        echo "Le formulaire a été envoyé avec comme email la valeur :".$lemail;
        if($connexion=mysqli_connect($server,$user,$pwd,$bdd))
        {
            echo "connexion ok";
            //A faire après la sélection BDO
            $requete="Select * from utilisateur WHERE email='$lemail'";
            echo "<br>".$requete."<br>";
            $resultat = mysqli_query($connexion, $requete);
            $login=0;
            while($donnees = mysqli_fetch_assoc($resultat))
            {
                $login =$donnees['login']; //mettre le nom du champ dans la table
                $mdp =$donnees['motdepasse'];
            }
            if ($login==0)
            {
                echo "email non trouvé";
            }
            else {
            //   ETAPE 1 : on genere un mot de passe aleatoire
                $newmdp = motdepasse(12);
                echo "<hr>$newmdp<hr>";

                $mdphache=md5($newmdp);
                //   ETAPE 2 ON MODIFIE LA BDD UPDATE AVEC LE NV MDP HACHE 
                $requete="UPDATE `utilisateur` SET `motdepasse` = '$mdphache' WHERE email ='$lemail';";
                if (!mysqli_query($connexion, $requete))
                {
                    echo "<br>Erreur : ".mysqli_error($connexion)."<br>";
                }


                // ETAPE 3 ENVOIE DU NOUVEAU MDP
                echo "<br> email trouvé = envoi de l'email";
                // Le message
                $message = "votre nouveau mot de passe est : '$newmdp' - votre login : '$login'";
                // Envoi du mail
                mail($lemail, 'Votre login/mot de passe sur le site des stages', $message);
            }
        }

        else {
            echo "erreur de connexion";
        }

    }   

?>


    <form method="post" action="oubli.php">
    Saisir Votre email : <input type="email" name="email"> <br>
    <input type="submit" value="Ok" name="envoi">
    </form>
    <a href ="oubli.php"> confirmation de mdp </a>






