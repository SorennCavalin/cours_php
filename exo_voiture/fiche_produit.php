<?php

require "inc/init.inc.php";

$id = $_GET["id"] ?? null;

if ($id) {
    if (is_numeric($id)) {
        $verif = connexion()->query("SELECT * FROM produit WHERE id = $id");
        if ($verif !== false) {
            if ($verif->rowCount() == 1) {
                $produit = $verif->fetch(PDO::FETCH_ASSOC);
            } else {
                redirection("erreur/404.php");
            }
        } else {
            redirection("erreur/404.php");
        }
    } else {
        redirection("erreur/404.php");
    }
} else {
    redirection("erreur/404.php");
}


affichage("produit/fiche.html.php", [
    "produit" => $produit,
    "h1" => "Fiche de la " . $produit["marque"]
]);
