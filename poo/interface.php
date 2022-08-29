<?php 
/*
INTERFACE : une interface ressemble à une classe abstraite mais il y des différences : 
    - toutes les méthodes de l'interface sont abstraites, c'est-à-dire qu'il n'y a pas de code,
        uniquement la déclaration de la méthode
    - on n'utilise pas le mot-clé abstract, ni pour l'interface, ni pour les méthodes
    - il ne peut pas y avoir de méthodes "normales" dans une interface
    - pour qu'une classe utilise une interface (on dit implémenter une interface), il faut 
        utiliser le mot-clé 'implements' après le nom de la classe ou après le nom de la classe héritée
    - quand une classe implémente une interface, il faut redéfinir toutes les méthodes qui sont définies
        dans l'interface
    - Une classe peut implémenter plusieurs interfaces
*/

interface Deplacement {
    public function seDeplacer();
}

interface Calendrier {
    public function aujourdhui();
} 


class Vehicule{}

class Voiture extends Vehicule implements Deplacement, Calendrier {
    public $marque;
    public $modele;

    public function seDeplacer()
    {
        return "je me déplace en roulant !";
    }
    public function aujourdhui()
    {
        return date("D d/m/Y");
    }
}


class Animal implements Deplacement {
    public $espece;
    public $milieu;
    public function seDeplacer(){
        return "mon déplacement dépend de mon espèce";
    }
}

class Mammifere extends Animal {
    public function seDeplacer(){
        return "je me déplace en marchant... sauf une exception";
    }
}

$vache = new Mammifere;
echo $vache->seDeplacer();