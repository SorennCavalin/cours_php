<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
$id = $_GET["id"] ?? null;
$request = $connexion->query("SELECT * FROM livre WHERE id = $id");
$livre = $request->fetch(PDO::FETCH_ASSOC);
// d_exit($livre);
$livre["h1"] = "Fiche du livre n°$id";

affichage("livre/information_livre.html.php", $livre);
