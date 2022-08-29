<?php

namespace Controlers;

class HomeControler extends Controler
{
    public function list()
    {
        $this->affichage("home.html.php", [
            "matches" => \Modeles\Bdd::selection("contest")
        ]);
    }
}
