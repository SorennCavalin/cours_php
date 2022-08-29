<?php

include "functions.inc.php";
/* 
    En programmation orienté objet, la notion d'héritage permet de créer une classe qui héritera de toutes les propriétés
    et toutes les méthodes d'une autre classe. Cela permet de ne pas redéclarer les mêmes propriétés dans plusieurs classes.
    Cela permet aussi d'avoir des méthodes communes à plusieurs classes qui seraient liées (par exemple la classe Voiture
    peut hériter d'une classe Vehicule. La classe Avion peut aussi hériter de la classe Vehicule).

    Pour faire hériter une classe d'une autre classe on utilise le mot-clé 'extends'.
    Une classe ne peut hériter DIRECTEMENT que d'une seule classe (il ne peut y avoir qu'une seule classe après 'extends')

*/

class Personne {
    public $prenom;
    /* 
    PROTECTED : une propriété (ou méthode) protégée est accessible directement dans la classe où elle est déclarée et
                dans toutes les classes qui héritent. Par contre, elle reste inaccessible aux objets créés de cette classe.
    */
    protected $nom;
    public $dateNaissance;
    public function identite() {
        return "<ul><li>Prénom : " . $this->prenom . "</li><li>Nom : " . $this->nom . "</li></ul>";
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
}

class Femme extends Personne {
    public $nomNaissance;

    public function epouser($nouveauNom){
        $this->nomNaissance = $this->getNom();
        // $this->setNom($nouveauNom);
        $this->nom = $nouveauNom;
    }

}

class Enfant extends Femme {}



$p1 = new Personne();
echo "Personne \$p1";
debug($p1);

$f1 = new Femme;
$f1->prenom = "Estelle";
$f1->setNom("Kiafessa");
$f1->epouser("Peuimporte");
echo $f1->identite();

// echo $p1->nom . "<br>";
// echo $f1->nom . "<br>";


echo "Femme \$f1";
debug($f1);

$h1 = new Homme;
echo "Homme \$h1";
debug($h1);

$e1 = new Enfant;
echo "Enfant \$e1";
debug($e1);

echo "<hr>";
/* L'opérateur 'instanceof' permet de savoir si un objet est une instance d'une classe donnée. Si on teste un 
    objet d'une classe qui hérite, instanceof retourne true. Par exemple
        un objet de la classe Femme peut être considéré comme une instance de la classe Femme mais aussi de la classe Personne
 */
if( $e1 instanceof Personne ) {
    echo "C'est un objet de la classe Personne";
} else {
    echo "Ce n'est pas un objet de la classe Personne";
}
echo "<br>";
if( $e1 instanceof Femme ) {
    echo "C'est un objet de la classe Femme";
} else {
    echo "Ce n'est pas un objet de la classe  Femme";
}
echo "<hr>";
