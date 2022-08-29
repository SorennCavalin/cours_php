<?php

/* Quand un fichier PHP ne contient que du PHP, on ne ferme pas la balise php.
    Ce fichier ne doit pas avoir de ligne vide avant la balise php
*/

// Déclaration d'une variable de type array
$tableau = [];      // $tableau est un array vide (il n'y a aucune valeur dans cet array)
$tableau2 = array(); // ancienne façon de déclarer un array vide

// Ajouter une valeur à un array
$tableau[] = 5;  // j'ajoute la valeur 5 à la variable $tableau qui est de type array
$tableau[] = "une chaîne de caractère";
$tableau[] = true;

// Accéder à une valeur de l'array
echo $tableau[1]; // affiche la 2ème valeur de $tableau (⚠ les indices d'un array commencent à 0)

echo $tableau[0] * 2; // on peut utiliser les valeurs de l'array comme n'importe quelle variable

// Modifier une valeur de l'array
$tableau[1] = "nouvelle chaîne de caractères";

/* On ne peut pas utiliser un array comme un string (donc PHP ne peut pas convertir un type array en 
    un type string) */
echo $tableau;
/* Les erreurs renvoyées par PHP : 
    il y a 3 niveaux d'erreurs 
        1. Notice
        2. Warning
        3. Fatal Error
    NB : Les erreurs fatales arrêtent l'exécution du code PHP
*/


echo "<pre>";
var_dump($tableau);
echo "<hr>";
print_r($tableau);
echo "</pre>";
echo "<hr>";

$tableau[8] = 789;
$tableau[] = "texte";

echo "<pre>";
var_dump($tableau);
echo "</pre>";

// Autre façon de déclarer un tableau, avec des valeurs
$tableau2 = [ 8, 79, 123, -5 ];
// $tableau2 = array( 8, 79, 123, -5 );

echo "<pre>";
var_dump($tableau2);
echo "</pre>";

// La taille d'un tableau : fonction count()
echo "Mon tableau a " . count($tableau) . " valeurs<br>";

// EXO afficher toutes les valeurs de $tableau2 dans une balise ol
echo "<ol>";
for($i = 0; $i < count($tableau2); $i++ ){
    echo "<li>";
    echo $tableau2[$i];
    echo "</li>";
}
echo "</ol>";

/* BOUCLE FOREACH : cette boucle permet de parcourir toutes les
    valeurs d'un array 
    
    SYNTAXE :
    foreach($variableTableau as $valeur) {}
    foreach($variableTableau as $indice => $valeur) {}
*/

foreach($tableau as $indice => $valeur){
    echo "<p>Indice $indice : $valeur</p>";
}

echo "<h2>TABLEAU ASSOCIATIF</h2>";
$personnage = [ "nom" => "Mentor", "prenom" => "Gérard" ];

echo "<pre>";
var_dump($personnage);
echo "</pre>";

echo "Le personnage s'appelle " . $personnage["prenom"] . " " . $personnage["nom"];

foreach($personnage as $indice => $valeur) {
    echo "<p>";
    echo "$indice : $valeur";
    echo "</p>";
}

// Ajouter l'indice "age" et la valeur 33 à la variable $personnage qui est de type array
$personnage["age"] = 33;

echo "<pre>";
var_dump($personnage);
echo "</pre>";

/* EXO : 
    1. déclarer une variable nommée personnage2 avec les indices nom, prenom, age et les valeurs seront vos informations
          personnelles.
    2. Ensuite afficher "Bonjour je m'appelle ... ... et j'ai ... ans."

    3. Créer un array $doubles contenant les 200 premiers nombres multiplié par 2 (en commençant par le nombre 1)
    4. Afficher 5 valeurs de cet array en commençant par le 4ième indice.

*/

$doubles = [];  // array();
for($i = 1 ; $i <= 200 ; $i++) {
    $doubles[] = $i * 2;
}

$doubles = [];  // array();
for($i = 1 ; $i <= 200 ; $i++) {
    $doubles[$i] = $i * 2;
}

echo "<pre>"; var_dump($doubles); echo "</pre>";

for($i = 0; $i < 5 ; $i++){
    echo $doubles[$i + 3];
}

for($i = 3; $i < 8 ; $i++){
    echo $doubles[$i];
}

/* array_splice(tableau, debut, longueur) 
        Fonction qui retourne un array qui sera une partie de l'array 'tableau'. Le premier indice récupéré sera 'debut', et
        l'array retourné aura 'longueur' valeurs.
*/
$partie = array_splice($doubles, 3, 5);
echo "<pre>"; var_dump($partie); echo "</pre>";

echo "<hr>";

$jours = [ "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche" ];

/* EXO : 1. En utilisant la variable $jours,  afficher les jours de la semaines dans une table HTML sans le week-end 
            indice : utiliser une boucle
            NB : <table border='1'>
         2. Afficher le 5ième jour de la semaine
         3. Afficher "Il y a ... jours dans une semaine" en utilisant la variable $jours pour connaître le nombre de jours
         4. Afficher les jours de la semaine en commençant par dimanche, samedi, ... et en finissant par lundi
*/

echo "<table border='1'>";
for ($i=0; $i < 5; $i++) { 
    echo "<tr><td>" . $jours[$i] . "</td></tr>";
}
echo "</table>";

echo "<table border='1'>";
foreach($jours as $jour){
    if( $jour != "samedi" && $jour != "dimanche" ){
        echo "<tr><td>" . $jour . "</td></tr>"; 
    }
}
echo "</table>";


echo "<table border='1'>";
foreach($jours as $indice => $jour){
    if($indice <= 4) {
        echo "<tr><td>" . $jour . "</td></tr>"; 
    }
}
echo "</table>";

echo "<p>Le 5ième jour de la semaine : " . $jours[4] . "</p>";

echo "Il y a " . count($jours) . " jours dans une semaine<br>";

for($i = 6; $i >= 0; $i--){
    echo "<p>" . $jours[$i] . "</p>";
}
