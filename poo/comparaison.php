<?php
include "functions.inc.php";
/* 
Lorsque l'on compare 2  variables objets, elles seront considérés comme égales (==) seulement et
seulement si 
    - les objets sont de la même classe
    - les objets ont les mêmes valeurs pour toutes leurs propriétés

Si on utilise la comparaison stricte (===), les variables seront considérées comme égales si et 
seulement si
    - les 2 variables font référence au même objet

Si on affecte une variable objet à une autre variable, les 2 variables feront référence au même objet.
Donc toute modification de l'objet sur l'une des variables se verra aussi sur l'autre variable 
(puisqu'en réalité, on manipule le même objet mais dans 2 variables différentes)

Si on veut affecter une variable avec une copie d'un objet, il faut utiliser le mot-clé 'clone'
ex:  
    $obj1 = clone $obj2;
*/

class A {
    public $nombre;
    public $texte;
}

class B {
    public $nombre;
    public $texte;
}

class C extends A {}

$obj1 = new A;
$obj1->nombre = 5;
$obj1->texte = "bonjour";

$obj2 = new A;
$obj2->nombre = 5;
$obj2->texte = "bonjour";

$obj3 = clone $obj1;
echo "<pre>"; var_dump($obj1, $obj2, $obj3); echo "</pre>";

if( $obj1 == $obj2 ){
    echo "les variables sont égales<br>";
} else {
    echo "les variables sont différentes<br>";
}
$obj1->nombre = 42;

if( $obj1 === $obj3 ){
    echo "les variables sont strictement égales<br>";
} else {
    echo "les variables sont strictement différentes<br>";
}

$obj3->texte = "j'ai modifié la valeur texte de l'objet 3";
echo "<pre>"; var_dump($obj1, $obj3); echo "</pre>";
