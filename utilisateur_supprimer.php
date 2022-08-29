<?php

include "inc/init.inc.php";

if (!empty($id = $_GET["id"] ?? null)) {
    try {
        $requete = $connexion->query("SELECT * FROM utilisateur WHERE id = $id");
        if ($requete) {
            if ($requete->rowCount() == 1) {
                $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
                debug($_POST);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $resultat = $connexion->exec("DELETE FROM utilisateur WHERE id = $id");
                    if ($resultat) {
                        $_SESSION["success"] = "L'utilisateur n°$id a bien été supprimé ! ";
                    } else {
                        $_SESSION["error"] = "Erreur lors de la suppression de l'utilisateur n°$id";
                    }
                    redirection("utilisateur_liste.php");
                };
            } else {
                $messageError = "Il n'y a pas d'utilisateur sous cet identifiant";
            }
        } else {
            $messageError = "Erreur sql";
        }
    } catch (PDOException $th) {
        $messageError = $th->getMessage();
    }
}

if (!isset($utilisateur)) {
    $_SESSION["error"] = $messageError;
    redirection("utilisateur_liste.php");
}

// AFICHAGE
include "vues/header.html.php";
include "vues/utilisateurs/confirmation.html.php";
include "vues/footer.html.php";
