<?php

require "inc/init.inc.php";

$id = $_GET["id"] ?? null;
if ($id) {
    if (is_numeric($id)) {
        $produits = selectionId("produits", $id);
        if (!$produits) {
            $_SESSION["erreur"] = "Auncun produits ne correspond à cet identifiant";
            redirection("/");
        }
    } else {
        redirection("erreur/404.php");
    }
} else {
    redirection("erreur/404.php");
}
$produits["h1"] = "Fiche du produits n°$id";
affichage("produits/fiche.html.php", ["produits" => $produits]);
