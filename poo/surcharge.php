<?php
include "functions.inc.php";

class Personne {
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

class Homme extends Personne {
    public $serviceMilitaire;

    public function __construct($prenom, $nom, $service)
    {
        parent::__construct($nom, $prenom);
        $this->serviceMilitaire = $service;
    }

    /* 
    SURCHARGE : Dans une classe enfant, on peut redéfinir une méthode qui existe dans la classe mère. On peut déclarer
                une méthode avec le même nom. Lorsque que cette méthode sera appelé à partir d'un objet de la classe enfant,
                ce sera cette nouvelle méthode qui sera exécutée. La méthode mère est 'cachée' par la méthode enfant.
                On dit que l'on a surchargé (overload) la méthode de la classe mère.
    */
    public function identite(){

        return parent::identite() . "<li>Service militaire : " . ($this->serviceMilitaire ? "oui" : "non") . "</li>";
    }

}

class Femme extends Personne {
    public $nomNaissance;

    public function __construct(){}

    public function epouser($nouveauNom){
        $this->nomNaissance = $this->getNom();
        $this->nom = $nouveauNom;
    }

    public function identite(){
        /* 
            Le mot-clé 'parent' fait référence à la classe mère de la classe actuelle. Lorsqu'on surcharge une méthode,
            si on veut utiliser le retour de la méthode mère, on va utiliser le mot 'parent' pour exécuter la méthode de 
            la classe mère. 
        */
        $texte = parent::identite();
        $texte .= "<li>Nom de naissance : " . $this->nomNaissance . "</li>";
        return $texte;
    }

}

$homme1 = new Homme("Abdel", "Kader", false);
// $homme1->prenom = "Abdel";
// $homme1->setNom("Kader");
// $homme1->serviceMilitaire = true;
echo "<ul>".$homme1->identite() . "</ul>";

$femme1 = new Femme;
$femme1->prenom = "Jacqueline";
$femme1->setNom("Boutboule");

echo "<ul>";
echo $femme1->identite();
echo "</ul>";
