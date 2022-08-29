<?php

require "inc/init.inc.php";

$id = $_GET["id"] ?? null;
if ($id) {
    if (is_numeric($id)) {
        $livre = selectionId("livre", $id);
        if (!$livre) {
            $_SESSION["erreur"] = "Auncun livre ne correspond à cet identifiant";
            redirection("/");
        }
    } else {
        redirection("erreur/404.php");
    }
} else {
    redirection("erreur/404.php");
}
$livre["h1"] = "Fiche du livre n°$id";
affichage("livre/fiche.html.php", ["livre" => $livre]);
