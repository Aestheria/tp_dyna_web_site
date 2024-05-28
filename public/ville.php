<?php
require_once('../include/connexion.php');

// Récupération de l'ID du supplier depuis les paramètres de l'URL, avec une valeur par défaut de 0
$id = (isset($_GET['id']))?$_GET['id']:0;

// Vérifie si l'ID est valide (différent de 0), sinon redirige vers la page suppliers.php
if($id == 0) {
 header("Location:$url/public/villes.php");
 die();
}
try {
// Prépare une requête SQL pour sélectionner les informations du fournisseur correspondant à l'ID fourni
 $requete = $bdd->prepare('select nom, codepostal, pays from ville where code = ?');

// Exécute la requête en passant l'ID du fournisseur en paramètre
$requete->execute(array($id));

// Récupère les résultats de la requête sous forme de tableau
 $ville = $requete->fetch();

// Affiche un message d'erreur et termine l'exécution du script en cas d'exception PDO
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
 <title>Fiche Ville <?php echo $ville['nom']; ?></title>
 <link href="css/bootstrap.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 <div class="container">
<!-- Affichage des informations sur la page -->
 <h1>Ville <?php echo $ville['nom']; ?></h1>
 <form>
            <div class="mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($ville['nom']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nom">Code Postal</label>
                <input type="text" class="form-control" id="codepostal" name="codepostal" value="<?php echo htmlspecialchars($ville['codepostal']); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nom">Pays</label>
                <input type="text" class="form-control" id="pays" name="pays" value="<?php echo htmlspecialchars($ville['pays']); ?>" readonly>
            </div>            
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 </body>
</html>