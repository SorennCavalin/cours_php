<?php

require "inc/init.inc.php";

$id = $_GET["id"] ?? null;
$request = $connexion->query("SELECT * FROM produits WHERE id = $id");
$produits = $request->fetch(PDO::FETCH_ASSOC);
// d_exit($produits);
$produits["h1"] = "Fiche du produits n°$id";

affichage("produits/information_produits.html.php", $produits);
