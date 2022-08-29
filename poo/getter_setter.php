<?php

class Personne {
    private $prenom;
    private $nom;

    /* Pour pouvoir utiliser les propriétés privées, on doit créer, pour chaque propriété, 2 méthodes 
        publiques : une pour modifier la valeur, l'autre pour accéder à cette valeur.
        Ces méthodes sont appelés SETTERS et GETTERS ( en anglais, SET veut dire définir, et GET 
        veut dire récupérer). 
        Il faut respecter la convention de nommage de ces méthode : 
        SETTER : set suivi du nom de la propriété avec une majuscule au début (MUTATEUR)
        GETTER : get suivi du nom de la propriété (ACCESSEUR)
        */
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
}

$p = new Personne;
$p->setPrenom("Jean");
$p->setNom("Cérien");

echo "<h1>";
echo $p->getPrenom() . " " . $p->getNom();
echo "</h1>";