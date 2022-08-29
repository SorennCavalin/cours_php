<?php
require "inc/init.inc.php";

/* 
URL: index.php?controleur=bijoux&methode=modifier&id=32
*/
$controleur = $_GET["controleur"] ?? "accueil";
$methode    = $_GET["methode"] ?? "liste";
$id         = $_GET["id"] ?? null;

$classeControleur = "Controleurs\\" . ucfirst($controleur) . "Controleur";  // ucfirst: met la première lettre d'un string en majuscule
/* $classeControleur = "Controleurs\BijouxControleur" 
   $methode = "liste"
*/

/* On peut instancier un objet en utilisant un string pour le nom de la classe.
    _⚠ le nom de la classe doit être dans une variable pour pouvoir utiliser 'new'
*/
$controleur = new $classeControleur;
// $bijouxControleur->modifier($id);
$controleur->$methode($id);

