<?php

include "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
$requete = $connexion->query("SELECT * FROM abonne");
$abonnes = $requete->fetchAll(PDO::FETCH_ASSOC);

affichage("abonne/table.html.php", [
    "h1" => "Liste des abonnés",
    "abonnes" => $abonnes
]);
