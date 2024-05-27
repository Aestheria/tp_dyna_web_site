<?php
require_once('include/connexion.php');
$id = (isset($_GET['id']))?$_GET['id']:0;
if($id == 0) {
 header("Location:$url/listefournisseur.php");
 die();
}
try {
 $requete = $bdd->prepare('select nom, adresse1, adresse2, ville, contact,
civilite from fournisseur where code = ?');
 $requete->execute(array($id));
 $fournisseur = $requete->fetch();
} catch (PDOException $e) {
 print "Erreur !: " . $e->getMessage() . "<br/>";
 die();
}
?>
<!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>fournisseur <?php echo $fournisseur['nom']; ?></title>
 <link href="css/bootstrap.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 </head>
 <body>
 <div class="container">
 <h1>fournisseur <?php echo $fournisseur['nom']; ?></h1>
 </div>
 </body>
</html>