<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}

$page = empty($_GET["page"]) ? 1 : $_GET["page"];
$nbParPage = 3;
$premier = ($page - 1) * $nbParPage;


$requete = $connexion->query("SELECT COUNT(*) FROM emprunt");
$nbLignes = $requete->fetch();
$nbLignes = $nbLignes[0];
$pageMax =  ceil($nbLignes / $nbParPage);  //fonction ceil : arrondi au nombre supérieur

$texteRequete = "SELECT e.*, a.pseudo, CONCAT(l.titre, ' - ', l.auteur) AS livre 
                 FROM emprunt e 
                    JOIN abonne a ON e.abonne_id = a.id
                    JOIN livre l ON e.livre_id = l.id
                 ORDER BY date_sortie
                 LIMIT $premier, $nbParPage";

$requete = $connexion->query($texteRequete);
$emprunts = $requete->fetchAll(PDO::FETCH_ASSOC);

affichage("emprunt/table.html.php", [
    "emprunts" => $emprunts,
    "h1" => "Liste des emprunts $page/$pageMax",
    "pageMax" => $pageMax
]);
