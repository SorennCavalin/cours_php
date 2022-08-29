<?php
include "functions.inc.php";

/* 
ABSTRACT : si on utilise le mot-clé 'abstract' avant le mot 'class', on dit que la classe est une 
            classe abstraite. On ne peut plus instancier d'objet de cette classe.
            Cette classe pourra être héritée.
*/
abstract class Personne {
    public $prenom;
    protected $nom;
    private $dateNaissance;

    /* 
        - une méthode abstraite ne peut être déclarée que dans une classe abstraite 
        - lors de la déclaration, on ne définit pas le corps de la méthode abstraite (pas de {}, pas d'instruction à exécuter)
        - ⚠ il faut mettre un ; à la fin de la déclaration de la méthode abstraite
        - La déclaration d'une méthode abstraite oblige à définir le corps de cette méthode dans tous les classes qui
            vont hériter de la classe abstraite
    */
    abstract public function presentation($salutation);

    public function __construct($nom, $prenom) {
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public function identite() {
        return "<li>Prénom : " . $this->prenom . "</li>
                    <li>Nom : " . $this->nom . "</li>";
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

}

class Homme extends Personne {
    public $serviceMilitaire;

    public function __construct($prenom, $nom, $service)
    {
        parent::__construct($nom, $prenom);
        $this->serviceMilitaire = $service;
    }

    public function identite(){

        return parent::identite() . "<li>Service militaire : " . ($this->serviceMilitaire ? "oui" : "non") . "</li>";
    }

    public function presentation($test = null){
        echo "Bonjour je m'appelle " . $this->prenom . " " . $this->nom . " et " . 
                ($this->serviceMilitaire ? "j'ai " : "je n'ai pas ") . "fait mon service militaire<br>";
    }
}

class Femme extends Personne {
    public $nomNaissance;

    public function __construct(){}

    public function presentation($salutation= null){} 

    public function epouser($nouveauNom){
        $this->nomNaissance = $this->getNom();
        $this->nom = $nouveauNom;
    }

    public function identite(){
        $texte = parent::identite();
        $texte .= "<li>Nom de naissance : " . $this->nomNaissance . "</li>";
        return $texte;
    }

}

$client1 = new Homme("Gerard", "Menfin", true);
$client2 = new Femme();
$client1->presentation();
$client2->presentation("");

// $personne = new Personne("Jean", "Cérien"); Je ne peux pas instancier la classe abstraite Personne


echo "Client 1";
debug($client1);
echo "Client 2";
debug($client2);
// echo "Personne";
// debug($personne);