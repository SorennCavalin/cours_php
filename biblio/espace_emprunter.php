<?php

require "inc/init.inc.php";

if (!connecte()) {
    redirection("erreur/403.php");
}

$livre_id = $_GET["id"] ?? null;
$abonneConnecte = connecte();
$abonne_id = $abonneConnecte["id"];
$date_sortie = date("Y-m-j");

$texteRequete = "INSERT INTO emprunt (date_sortie, livre_id, abonne_id) 
                 VALUES ('$date_sortie', $livre_id, $abonne_id)";

$requete = connexion()->exec($texteRequete);
if ($requete) {
    $_SESSION["succes"] = $abonne["pseudo"] . ", votre emprunt du " . date("d/m/Y") . " a bien été enregistré";
    redirection("espace_abonne.php");
} else {
    $_SESSION["erreur"] = "Emprunt impossible";
    redirection("/");
}
