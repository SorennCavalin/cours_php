<?php

namespace Controlers;

abstract class Controler
{
    protected $id;

    public function affichage($fichier, array $parametres = [])
    {
        extract($parametres);
        if (!empty($erreurs)) {
            echo "<div class='erreur-formulaire'>";
            foreach ($erreurs as $err) {
                echo "<div class='text-danger'>$err</div>";
            }
            echo "</div>";
        }
        include "vues/header.html.php";
        include "vues/$fichier";
        include "vues/footer.html.php";
    }
}
