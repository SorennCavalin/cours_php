<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
$id = $_GET["id"] ?? null;

if ($id && is_numeric($id)) {
    $emprunt = selectionId("emprunt", $id);
    if ($emprunt) {
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
                if (empty($date_rendu)) {
                    $texteRequete = "UPDATE emprunt
                                    SET date_sortie = '$date_sortie',
                                        livre_id = $livre_id,
                                        abonne_id = $abonne_id
                                    WHERE id = $id";
                } else {
                    $texteRequete = "UPDATE emprunt
                                    SET date_sortie = '$date_sortie',
                                        date_rendu = '$date_rendu',
                                        livre_id = $livre_id,
                                        abonne_id = $abonne_id
                                    WHERE id = $id";
                }
                $requete = connexion()->exec($texteRequete);
                if ($requete) {
                    $_SESSION["succes"] = "L'emprunt n°$id a été modifié";
                    redirection("emprunt_liste.php");
                } else {
                    $_SESSION["erreur"] = "Erreur SQL";
                }
            }
        }
    } else {
        $_SESSION["erreur"] = "Il n'y a pas d'emprunt avec cet identifiant";
        redirection("emprunt_liste.php");
    }
} else {
    $_SESSION["erreur"] = "Erreur 404 : La page demandée n'existe pas";
    redirection("emprunt_liste.php");
}

affichage("emprunt/form.html.php", [
    "h1" => "Modifier l'emprunt n°$id",
    "emprunt" => $emprunt,
    "erreurs" => $erreurs ?? null,
    "abonnes"   => selection("abonne"),
    "livres"    => selection("livre"),
]);
