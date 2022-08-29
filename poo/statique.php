<?php

/*  
Les propriétés et méthodes statiques sont des propriétés ou méthodes liés à une classe plutôt qu'à un
objet. Cela signifie qu'il n'y a pas besoin d'utiliser un objet pour accéder à ces membres
*/

class Personne {
    const NIVEAU_ADMIN = 50;
    const NIVEAU_CLIENT = 10;

    private $prenom;
    private $nom;
    public static $nb = 0;

    public function __construct($prenom = null, $nom = null){
        $this->prenom = $prenom;
        $this->nom = $nom;
        /* Le mot-clé 'self' fait référence à la classe en cours (la classe dans laquelle le mot est utilisé) 
            Ici, au lieu d'utiliser Personne pour accéder à la propriété statique $nb, on utilise 'self' */
        self::$nb++;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }

    /**
     * Cette méthode retourne la date actuelle
     */
    public static function aujourdhui(){
        return date("d/m/Y");
    }
}

$p = new Personne;
$p->setNom("Mal");
$p->setPrenom("Roger");

echo "La valeur de la propriété statique \$nb est : " . Personne::$nb . "<br>";

$p1 = new Personne;
$p1->setNom("Kiafessa");
$p1->setPrenom("Estelle");

echo "La valeur de la propriété statique \$nb est : " . Personne::$nb . "<br>";


echo "<p>";
echo "Bonjour, je m'appelle " . $p->getPrenom() . " " . $p->getNom() . ", nous sommes le " . Personne::aujourdhui();
echo "</p>";
echo "<p>";
echo "Bonjour, je m'appelle " . $p1->getPrenom() . " " . $p1->getNom() . ", nous sommes le " . Personne::aujourdhui();
echo "</p>";

echo "Le niveau admin est " . Personne::NIVEAU_ADMIN . "<br>";
