<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
$id = $_GET["id"] ?? null;
if ($id) {
    if (is_numeric($id)) {
        $requete = $connexion->query("SELECT * FROM abonne WHERE id = $id");
        if ($requete !== false) {
            if ($requete->rowCount() == 1) {
                $abonne = $requete->fetch(PDO::FETCH_ASSOC);
            }
        } else {
            $_SESSION["erreur"] = "Erreur requête SQL";
        }
    } else {
        $_SESSION["erreur"] = "Erreur 404 : cette page n'existe pas";
    }
} else {
    $_SESSION["erreur"] = "Erreur 403 : vous n'avez pas accès à cet URL";
    redirection("abonne_liste.php");
}

affichage("abonne/fiche.html.php", [
    "abonne" => $abonne,
    "h1" => "Fiche abonné"
]);
