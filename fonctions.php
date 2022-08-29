<?php
/* PORTÉE DES VARIABLES (=scope) 
- La portée d'une variable correspond à l'endroit du code où cette variable est accessible. 
- Dans la déclaration d'une fonction, on ne peut utiliser que les variables qui sont
déclarées dans cette fonction, ou qui sont passées dans les arguments de la fonction.
- Une variable déclarée dans une fonction, n'est accessible que dans cette fonction.

*/

include "functions.inc.php";
$aujourdhui = "mardi";
echo $aujourdhui . "<br>";
$variableGlobale = 32;
define("PI", 3.1415);

function salutation($prenomAsaluer){
    return "Bonjour $prenomAsaluer";
    echo "Cette phrase ne sera jamais affichée !";
}


function addition($nombre1, $nombre2){
    // var_dump($_GET);
    /* On peut utiliser une variable qui n'a pas été déclarée dans une fonction que si on utilise
        le mot-clé 'global'. Il faut ajouter l'instruction suivante :
            global $nomDeLaVariable;
        */
    global $variableGlobale;
    $somme = $nombre1 + $nombre2 + $variableGlobale + PI;
    return $somme;
}

// EXO : afficher le résultat de 7 + 12 en utilisant la fonction addition
//          vous devez afficher "Le résultat de l'addition 7 + 12 = 19"
var_dump($_GET);
$somme = addition(7, 12);
echo "Le résultat de l'addition de 7 + 12 = " . $somme . "<br>";
echo "La valeur de pi est " . PI . "<br>";


$prenom = "Pierre";
// echo "Bonjour $prenom";
echo salutation($prenom);

echo "<hr>";

$prenom = "Gertrude";
echo salutation($prenom, ", comment allez-vous ?");
// echo ", comment allez-vous ?";

// echo "Bonjour $prenom, comment allez-vous ?"; 

echo "<hr>";

// $prenom = "Sandro";
// echo "Bonjour $prenom<br>";
ecrire(salutation("Sandro<br>"));

// salutation();

ecrire("Bienvenue au cours de php");
ecrire("Vive le Pole S");

ecrire("Il est 9h " . salutation("à tous"));

debug($prenom);