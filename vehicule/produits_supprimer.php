<?php

require "inc/init.inc.php";

$id = $_GET["id"] ?? null;

if ($id) {
    if (is_numeric($id)) {
        $requete = $connexion->query("SELECT * FROM produits WHERE id = $id");
        if ($requete && $requete->rowCount() == 1) {
            $produits = $requete->fetch(PDO::FETCH_ASSOC);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $requete = $connexion->exec("DELETE FROM produits WHERE id = $id");
                if ($requete) {
                    $_SESSION["succes"] = "Le produits n°$id a bien été supprimé";
                    redirection("produits_liste.php");
                } else {
                    $_SESSION["erreur"] = "Erreur lors de la tentative de suppression";
                    redirection("produits_liste.php");
                }
            }
        } else {
            $_SESSION["erreur"] = "Erreur SQL ou aucun produits ne correspond à cet identifiant";
            redirection("produits_liste.php");
        }
    } else {
        $_SESSION["erreur"] = "ERREUR 404 : la page demandée n'existe pas";
    }
}

// AFFICHAGE
$produits["h1"] = "Supprimer le produits n°$id ?";
$produits["mode"] = "suppression";
affichage("produits/form.html.php", $produits);
