<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Liste des fournisseurs</title>
        <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>Les fournisseurs</h1>
<?php
include("../include/connexion.php");

/**
 * Page qui affiche la liste de tous les fournisseurs
 */

$requete = 'SELECT fournisseur.nom AS fournisseur_nom
            , civilite.libelle AS civilite_libelle
            , fournisseur.contact AS fournisseur_contact
            , ville.codepostal AS ville_codepostal
            , ville.nom AS ville_nom
            , fournisseur.code AS fournisseur_code
            FROM fournisseur
            INNER JOIN civilite ON  civilite.code
            INNER JOIN ville ON ville.code
            GROUP BY fournisseur.nom
            ORDER BY fournisseur.code';
?>
    <table class="table table-striped display" style="width:100%" id="suppliers">
        <thead>
            <tr class="clickable-row">
                <th>Nom</th>
                <th>Civilité</th>
                <th>Contact</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Code</th>
            </tr>
        </thead>
        <tbody>
<?php
try {
    foreach($bdd->query($requete) as $ligne) {
        echo '<tr>';
        echo '<td>' . $ligne['fournisseur_nom'] . '</td>';
        echo '<td>' . $ligne['civilite_libelle'] . '</td>';
        echo '<td>' . $ligne['fournisseur_contact'] . '</td>';
        echo '<td>' . $ligne['ville_codepostal'] . '</td>';
        echo '<td>' . $ligne['ville_nom'] . '</td>';
        echo '<td>' . $ligne['fournisseur_code'] . '</td>';
        echo "</tr>\n";
    }
} catch (PDOException $e) {
    echo 'Erreur !: ' . $e->getMessage() . '<br>';
    die();
}

?>
        </tbody>
    </table>
    </div>
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/datatables.net/js/dataTables.min.js"></script>
        <script src="../node_modules/dataTables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#suppliers').DataTable();
            });
        </script>
    </body>
</html>