<?php
include "functions.inc.php";

/* 
Lorsque l'on instancie un objet avec le mot-clé 'new', il y a une méthode qui s'exécute automatiquement
pour créer l'objet. En POO, cette méthode s'appelle un CONSTRUCTEUR
En PHP, la méthode constructeur se nomme __construct  (⚠ il y a 2 _)
NB : il y a plusieurs méthodes qui commencent par 2 _, il s'agit de méthodes magiques, qui sont définies
    par PHP et qui sont déclenchées à certains moments.
*/
class Vetement {
    public $titre;
    public $taille;
    private $couleur;

    public function __construct($titre = null, $taille = null, $couleur = null){
        $this->titre = $titre;
        $this->taille = $taille;
        $this->changeCouleur($couleur);
        /* 
        _⚠ Il ne doit pas y avoir de return dans un constructeur. La méthode constructeur renvoie déjà
            un objet
        */
    }

    public function __toString()
    {
        /* Cette méthode magique est déclenchée lorsqu'un objet doit être convertit en string (lors d'une concaténation par exemple) */
        return $this->titre . ", " . $this->taille . ", " . $this->couleur;
    }

    public function changeCouleur($couleur){
        if( in_array($couleur, [ "blanc", "noir", "bleu", "rose" ]) ){
            $this->couleur = $couleur;
        } else {
            $this->couleur = "blanc";
        }
    }
}

$v1 = new Vetement("pantalon", 36, "vert");
debug($v1);

$v2 = new Vetement("veste", "M", "blanc");
debug($v2);

$v3 = new Vetement();
$v1->changeCouleur("rouge");

echo "le vêtement est un(e) " . $v1;
debug($v1);
/* EXO : lorsqu'un objet Vetement est converti en string, il doit retourner ses propriétés séparées par des virgules */

/*  EXO :
    Créer une méthode pour que l'on ne puisse pas mettre n'importe quelle valeur à la propriété couleur.
    Les seules valeurs possibles seront blanc, noir, bleu, rose. Si une autre valeur est utilisé, affectez "blanc"
*/