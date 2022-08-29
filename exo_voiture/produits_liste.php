<?php

require "inc/init.inc.php";

if (!connecteAdmin()) {
    redirection("erreur/403");
}
if (empty($_GET["page"])) {
    redirection("produits_liste.php?page=1");
}
$page = $_GET["page"];
$nbProduits = connexion()->query("SELECT Count(id) as compte FROM produit")->fetch(PDO::FETCH_ASSOC);
$pageMax = ceil($nbProduits["compte"] / 5);
$nombreRequete = ($page - 1) * 5;
$requete = connexion()->query("SELECT *
                                FROM produit
                                LIMIT $nombreRequete,5");
if ($requete->rowCount() <= 0) {
    redirection("produits_liste.php?page=1");
}
$produits = $requete->fetchAll(PDO::FETCH_ASSOC);
$pages = ["pageMax" => $pageMax, "page" => $page];
affichage("produit/liste.html.php", [
    "h1" => "liste des voitures page n°$page/$pageMax",
    "produits" => $produits,
    "pages" => $pages
]);
