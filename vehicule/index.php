<?php
require "inc/init.inc.php";

affichage("accueil.html.php", [
    "produits" => selection("produits")
]);
