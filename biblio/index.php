<?php
require "inc/init.inc.php";

affichage("accueil.html.php", [
    "livres" => selection("livre")
]);
