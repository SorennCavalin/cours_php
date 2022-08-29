<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
if ($_POST) {
    extract($_POST);
    if (empty($date_sortie)) {
        $erreurs[] = "La date de sortie est obligatoire";
    }

    if (empty($livre_id)) {
        $erreurs[] = "Vous devez choisir un livre";
    }

    if (empty($abonne_id)) {
        $erreurs[] = "Vous devez choisir un abonné";
    }

    if (empty($erreurs)) {
        $texteRequete = "INSERT INTO emprunt ";
        $texteRequete .= "(date_sortie, livre_id, abonne_id";
        if (!empty($date_rendu)) {
            $texteRequete .= ", date_rendu";
        }
        $texteRequete .= ") VALUES ('$date_sortie', $livre_id, $abonne_id";
        if (!empty($date_rendu)) {
            $texteRequete .= ", '$date_rendu'";
        }
        $texteRequete .= ")";

        $requete = connexion()->query($texteRequete);
        if ($requete && $requete->rowCount() == 1) {
            $_SESSION["succes"] = "L'emprunt a bien été ajouté";
            redirection("emprunt_liste.php");
        } else {
            $_SESSION["erreur"] = "Erreur SQL lors de l'insertion";
        }
    }
}


affichage("emprunt/form.html.php", [
    "h1"        => "Ajouter un emprunt",
    "abonnes"   => selection("abonne"),
    "livres"    => selection("livre"),
    "erreurs"   => $erreurs ?? null
]);
