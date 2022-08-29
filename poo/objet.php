<?php
include "functions.inc.php";
$bdd = new PDO("mysql:host=localhost;dbname=biblio", "root", "");
echo "<pre>";
var_dump($bdd);

/* 
Un objet est un type de données PHP. Il est toujours lié à une classe.
La classe est la définition des caractéristiques de l'objet.
C'est une sorte de schéma qui va permettre à PHP de construire des variables
de type objet.

Par exemple, PDO est une classe. $bdd est un objet de la classe PDO
*/

class classeA {
    /* Les PROPRIÉTÉS, que l'on déclare dans une classe, vont correspondre
        à des variables mais qui seront liées aux objets qui seront déclarés 
        On utilise le mot-clé public puis le $ comme pour nommer une variable */
    public $prenom;
    public $nom = "nom de famille";  // je peux définir une valeur par défaut à une propriété
    
    /* 
        PRIVATE : une propriété (ou une méthode) privée n'est accessible QUE dans la classe. 
                 Si on instancie un objet de cette classe, il n'aura pas accès à cette propriété, que ce soit pour
                 modifier sa valeur ou pour l'utiliser (pour l'afficher par exemple)
        PUBLIC : une propriété (ou une méthode) publique est accessible partout, dans la classe et en dehors de la classe.
    */
    private int $age; // Depuis PHP 7, on peut définir le type d'une propriété

    /* Les MÉTHODES sont des fonctions qui vont être liées aux objets (ou aux classes) */
    public function identite(): string
    {
        /* $this représente l'objet actuel, c'est-à-dire l'objet qui va appeler la méthode dans laquelle on l'utilise.
            $this ne peut s'utiliser que dans la déclaration d'une classe
        */
        return $this->prenom . " " . $this->nom;
    }

    public function quelAge(): string
    {
        return "j'ai " . $this->age . " ans";
    }

    public function changerAge($age){
        if( is_numeric($age) ){
            $this->age = $age;
        } else {
            throw new Exception("La propriété age doit être de type integer");
        }
        
    }
}

/* 
    Pour déclarer une variable objet, on doit utilisé le mot-clé 'new' suivi dun nom de la classe.
    On dit qu'on INSTANCIE un objet (INSTANCIATION)
*/
$objetA = new classeA;
debug($objetA);
$objetA->prenom = "Gertrude";
$objetA->nom = "Olafsson";
echo "Je m'appelle " . $objetA->prenom . " " . $objetA->nom . ".<br>";
debug($objetA);

$arrayA = [ "prenom" => null ];
$arrayA["prenom"] = "Gertrude";
echo "Je m'appelle " . $arrayA["prenom"] . ".<br>";

$arrayB["prenon"] = "test";
echo "<hr>";
$arrayA = (object)$arrayA;
$arrayA->nouvellePropriete = 32;
echo $arrayA->prenom;

debug($arrayA);
$objetB = new classeA;
$objetB = (array)$objetB;
debug($objetB);
echo "<hr>";
//  EXO : Instanciez un objet dans une variable nommée 'moi', affectez votre nom et prénom à cet objet. 
// Affichez dans une balise h2, 'Bonjour, je m'appelle ... ...' 
$moi = new classeA;
$moi->prenom = "Gérard";
$moi->nom = "Mentor";
echo "<h2>Bonjour, je m'appelle " . $moi->prenom . " " . $moi->nom . "</h2>";

echo   "<p>Identité de \$moi : " . $moi->identite() . "</p>";
debug($moi);
debug($moi->identite());

echo "<p>Identité de l'objetA : " . $objetA->identite() . "</p>";

/* EXO 
    1. ajouter une propriété nommée 'age' à la classe classeA 
    2. ajouter une méthode 'quelAge' qui retourne un string qui contiendra la phrase "j'ai ... ans" (les ... sont remplacés par l'age)
    3. affectez votre age à la variable 'moi' et affichez 'Bonjour, je m'appelle ... ... et j'ai ... ans' en utilisant 
        les méthodes de la classe
*/
// $moi->age = "test";
try {
    $moi->changerAge("test");
    echo "Bonjour, je m'appelle " . $moi->identite() . " et " . $moi->quelAge() . "<br>";
} catch (Throwable $th) {
    echo "<div style='color:red'>" . $th->getMessage() . "</div>";
    //throw $th;
}

$objetA->changerAge(50);
echo "Bonjour, je m'appelle " . $objetA->identite() . " et " . $objetA->quelAge() . "<br>";

