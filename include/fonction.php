<?php
/**
 * Fonction qui génère un input type select avec toutes les villes
 * @param $id id du select
 * @return code HTML à afficher
 */
function selectVille($id, $selectedId = null) {
    global $bdd;
    $retour = "<select class=\"form-control\" id=\"$id\" name=\"$id\">\n";
    try {
    $requete = 'select code, nom from ville';
    foreach($bdd->query($requete) as $ligne) {
    $selected = ($ligne['code'] == $selectedId) ? ' selected="selected"' : '';
    $retour .= '<option value="'.htmlspecialchars($ligne['code']).'"'.$selected.'>'.
    htmlspecialchars($ligne['nom']).'</option>'."\n";
 }
} catch (PDOException $e) {
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}
$retour .= "</select>";
return $retour;
}

function selectCivilite($id, $selectedId = null) {
    global $bdd;
    $retour = "<select class=\"form-control\" id=\"$id\" name=\"$id\">\n";
    try {
    $requete = 'select code, libelle from civilite';
    foreach($bdd->query($requete) as $ligne) {
    $selected = ($ligne['code'] == $selectedId) ? ' selected="selected"' : '';
    $retour .= '<option value="'.htmlspecialchars($ligne['code']).'"'.$selected.'>'.
    htmlspecialchars($ligne['libelle']).'</option>'."\n";
}
} catch (PDOException $e) {
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}
$retour .= "</select>";
return $retour;
}

//Fonction menu actif
function menuActif($menu) {
    $ecran = basename($_SERVER['SCRIPT_FILENAME'], ".php");
    return ($ecran === $menu) ? 'active' : '';
}