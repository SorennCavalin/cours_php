<?php

namespace Controleurs;

abstract class ControleurBase {
    public function affichage($fichier, array $parametres = []){
        extract($parametres);
    
        include "vues/header.html.php";
        include "vues/$fichier";
        include "vues/footer.html.php";
    }    
}