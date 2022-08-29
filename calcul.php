<?php

/* 
Pour récupérer les données envoyées d'un formulaire, on utilise une variable
déclarer par PHP : $_GET
Cette variable est dite SUPERGLOBALE. Les variables SUPERGLOBALES sont des 
variables définies dans PHP, accessibles partout.
Elles sont toujours nommées $_ suivi du nom en majuscules.
Elles sont toutes de type array.
Elles ont toutes un rôle défini
    $_GET       : contient les données passées dans l'URL ou dans un formulaire en méthode GET
    $_POST      : contient les données passées dans un formulaire en méthode POST
    $_SESSION   : contient les informations stockées dans la session utilisateur
    $_SERVER    : contient des informations sur le serveur sur lequel se trouve le site php
    $_COOKIE    : contient les cookies
    $_FILES     : contient les informations des fichiers uploadés dans un formulaire
*/

include "functions.inc.php";
debug($_GET);
echo "<pre>";
print_r($_GET);
echo "</pre>";
debug($_POST);

// EXO afficher "La valeur tapée dans le formulaire est ..."

echo "La valeur tapée dans le formulaire est " . $_GET["nombre"] . "<br>";

/* 
    EXO :  (cf. sharemycode.fr/exercices)
    1. ajouter un input dans la balise form. L'input sera nommé 'nombre2'.
    Affichez toutes les valeurs envoyés par le formulaire (qui est en méthode GET)
    
    2. Récupérez les 2 valeurs et affichez la somme des 2

    3. Ajouter dans le fichier functions.inc.php, une fonction nommée 'operation' qui prend 2 arguments
    et qui retourne la somme des 2 arguments.
    Modifier le code qui suit pour utiliser cette fonction 
    
*/

echo "La valeur tapée dans le 2ième champ du formulaire est " . $_GET["nombre2"] . "<br>";
$resultat = $_GET["nombre"] + $_GET["nombre2"];
echo "La somme des 2 nombres est égale à $resultat <br>";
echo "La somme des 2 nombres est égale à " . operation($_GET["nombre"], $_GET["nombre2"], $_GET["operateur"]) . "<br>";

foreach ($_GET as $indice => $valeur) {
    echo "$indice = $valeur <br>";
}

echo $_GET['nombre'] . " " . $_GET['operateur'] . " " . $_GET['nombre2'] . " = " . operation($_GET["nombre"], $_GET["nombre2"], $_GET["operateur"]);

echo "<br><a href='formulaire.php'>retour</a>";
