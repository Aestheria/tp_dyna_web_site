<?php
require_once('../include\connexion.php');
require_once('include/fonction.php');

// Récupération de l'ID du supplier depuis les paramètres de l'URL, avec une valeur par défaut de 0
$id = (isset($_GET['id']))?$_GET['id']:0;

// Vérifie si l'ID est valide (différent de 0), sinon redirige vers la page suppliers.php
if($id == 0) {
 header("Location:$url/public/suppliers.php");
 die();
}
try {
// Prépare une requête SQL pour sélectionner les informations du fournisseur correspondant à l'ID fourni
 $requete = $bdd->prepare('select nom, adresse1, adresse2, ville, contact,
civilite from fournisseur where code = ?');

// Exécute la requête en passant l'ID du fournisseur en paramètre
$requete->execute(array($id));

// Récupère les résultats de la requête sous forme de tableau
 $fournisseur = $requete->fetch();

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
 <title>fournisseur <?php echo $fournisseur['nom']; ?></title>
 <link href="css/bootstrap.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 <div class="container">
<!-- Affichage des informations sur la page -->
 <h1>fournisseur <?php echo $fournisseur['nom']; ?></h1>
 <form>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($fournisseur['nom']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="adresse1">Adresse 1</label>
                <input type="text" class="form-control" id="adresse1" name="adresse1" value="<?php echo htmlspecialchars($fournisseur['adresse1']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="adresse2">Adresse 2</label>
                <input type="text" class="form-control" id="adresse2" name="adresse2" value="<?php echo htmlspecialchars($fournisseur['adresse2']); ?>" readonly>
            </div>
                <div class="form-group row">
                <label class="col-form-label col-sm-2" for="ville">Ville</label>
                <div class="col-sm-10">
                <?php echo selectVille('ville'); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo htmlspecialchars($fournisseur['contact']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="civilite">Civilité</label>
                <input type="text" class="form-control" id="civilite" name="civilite" value="<?php echo htmlspecialchars($fournisseur['civilite']); ?>" readonly>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 </body>
</html>