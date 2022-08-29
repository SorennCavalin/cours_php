<?php

$connexion = new PDO("mysql:host=localhost;dbname=tournoi", "root", "");
/* ⚠ Il faut inclure le fichier autoload AVANT d'exécuter la fonction session_start() sinon il y aura
        une erreur si on essaye de stocker un objet dans la variable superglobale $_SESSION */
require "autoload.php";
session_start();
include __DIR__ . "/functions.inc.php";
define("ROOT", "/poles_php/animal_tournoi/");
