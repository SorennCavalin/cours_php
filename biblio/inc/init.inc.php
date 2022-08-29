<?php

$connexion = new PDO("mysql:host=localhost;dbname=biblio", "root", "");
session_start();
include __DIR__ . "/functions.inc.php";
define("NIVEAU_ABONNE", 10);
define("NIVEAU_ADMIN", 50);
