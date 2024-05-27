<?php
/**
 * Fonction qui génère un input type select avec toutes les villes
 * @param $id id du select
 * @return code HTML à afficher
 */
function selectVille($id) {
 global $bdd;
 $retour = "<select class=\"form-control\" id=\"$id\" name=\"$id\">\n";
 try {
 $requete = 'select code, nom from ville';
 foreach($bdd->query($requete) as $ligne) {
 $retour .= '<option value='.$ligne['code'].'>'.
$ligne['nom'].'</option>'."\n";
 }
 } catch (PDOException $e) {
 print "Erreur !: " . $e->getMessage() . "<br/>";
 die();
 }
 $retour .= "</select>";
 return $retour;
}