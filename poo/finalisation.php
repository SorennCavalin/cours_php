<?php
include "functions.inc.php";

class Personne2 {
    public $prenom;
    protected $nom;
    private $dateNaissance;

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

class Homme extends Personne2 {
    public $serviceMilitaire;

    public function __construct($prenom, $nom, $service)
    {
        parent::__construct($nom, $prenom);
        $this->serviceMilitaire = $service;
    }

    /*
    FINAL : pour une méthode, le mot-clé 'final' signifie qu'on ne peut pas surcharger cette méthode dans une classe qui 
            va hériter.
    */
    final public function identite(){

        return parent::identite() . "<li>Service militaire : " . ($this->serviceMilitaire ? "oui" : "non") . "</li>";
    }

}

/*
   FINAL : Le mot-clé 'final' utilisée avant 'class' désigne une classe qui ne pourra pas être héritée. 
*/
final class Femme extends Personne2 {
    public $nomNaissance;

    public function __construct(){}

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

// La classe Enfant ne peut pas hériter de la classe finale Femme
class Enfant extends Homme {
    public function identitee(){
        return "méthode identité de la classe Enfant";
    }
}

echo "Enfant";
$enfant = new Enfant("prenom", "nom", false);
debug($enfant);
echo $enfant->identite();

echo "Femme";
$femme = new Femme;
debug ($femme);