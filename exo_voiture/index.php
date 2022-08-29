<?php

require 'inc/init.inc.php';
$produits = selection("produit");



affichage("accueil.html.php", [
    "produits" => $produits,
]);
