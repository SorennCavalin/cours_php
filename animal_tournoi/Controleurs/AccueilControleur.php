<?php

namespace Controleurs;

/*
Quand on précise un namespace dans un fichier, toutes les classes appelées dans ce fichier sont considérées comme
étant dans le même namespace.
par exemple, dans l'instruction 
    Modeles\Bdd::selection("animal")
la classe Bdd recherchée par PHP est Controleurs\Modeles\Bdd
Pour spécifier qu'une classe utilisée dans le fichier ne fait pas partie du namespace, il y a 2 possiblités : 
    - utiliser un \ au début du nom de la classe (comme si on remontait à la racine des namespaces)
    - ajouter, avant la classe et après le namespace, une instruction 'use' suivi du nom complet de la classe
        par exemple : use Modeles\Bdd;
        Si cette instruction est ajoutée, on peut utiliser un alias de la classe Modeles\Bdd, c'est-à-dire Bdd
*/

class AccueilControleur extends ControleurBase
{
    public function liste()
    {
        $this->affichage("accueil.html.php", [
            "animals" => \Modeles\Bdd::selection("animal"), [
                "h1" => "Bienvenue à Trésor"
            ]
        ]);
    }
}
