<?php

require "inc/init.inc.php";

if (!connecte()) {
    redirection("/erreur/403.php");
}
$abonne = connecte();
$texteRequete = "SELECT *, CONCAT(l.titre, ' - ' , l.auteur) AS livre
             FROM emprunt e JOIN livre l ON e.livre_id = l.id
             WHERE abonne_id = " . $abonne["id"];

$requete = connexion()->query($texteRequete);
if ($requete) {
    $emprunts = $requete->fetchAll(PDO::FETCH_ASSOC);
} else {
    $emprunts = [];
}
affichage("espace/index.html.php", [
    "abonne" => connecte(),
    "h1" => "Mon espace abonné",
    "emprunts" => $emprunts
]);
