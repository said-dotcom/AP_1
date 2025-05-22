<?php
include ("_conf.web.php");
session_start();
$date_du_jour = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');
if ($connexion = mysqli_connect('','u937355202_BouziteSaid','Bouzi3255&','u937355202_BouziteSaidBDD')){
        echo 'felicitations pour la connexion à la base de donnée';
    }
    else {
        echo 'erreur de de connexion de la base de donnée'; 
    }
    ?>

<?php
//A faire après la sélection BDD
$requete="SELECT description FROM cr WHERE date = '$date_du_jour'";
$result = mysqli_query($connexion, $requete);
if ($row = mysqli_fetch_assoc($result)) {
        $description = $row['description'];
    }

echo $date_du_jour;
?> 

<h1>Affichage Compte Rendu</h1>
<form action="creer_comptesrendus.php" method="post">
<label for="date"> Compte rendu du :</label>
<input
  type="date"
  id="date"
  name="date"
  value ="<?php echo $date_du_jour; ?>"
  />
 
<button type="submit" name="action" value="check">Modifier</button>
</form>
</a><br>
<form method="post" action="traitement_cr.php">
<label for="description"> Descriptif :</label><br>
        <textarea id="description" name="description" rows="15" cols="45" required><?php echo "$description";?></textarea><br><br>

        <input type="submit" value="Inserer">
        
</form>
<?php $_SESSION['date'] = $date_du_jour; ?>
