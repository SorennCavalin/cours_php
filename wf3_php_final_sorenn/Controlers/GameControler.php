<?php

namespace Controlers;

use Modeles\Bdd;
use Modeles\Session;
use Controlers\Controler;
use Modeles\Entities\Game;

class GameControler extends Controler
{
    public function insert()
    {
        $game = new Game;
        if ($_POST) {
            $game->setTitle(htmlentities(addslashes($_POST["title"])) ?? null);
            $game->setMin_players($_POST["min_players"] ?? null);
            $game->setMax_players($_POST["max_players"] ?? null);
            $erreurs = [];

            // Vérification de la validité du formulaire
            if (empty($game->getTitle())) {
                $erreurs[] = "Veuillez nommer votre jeu";
            }
            if (strlen($game->getTitle()) > 50) {
                $erreurs[] = "Le nom du jeu est trop long, raccourcissez le je vous pris";
            }
            if (!is_numeric($game->getMin_players()) || $game->getMin_players() <= 1) {
                $erreurs[] = "Le nombre minimum de participants doit etre un numero supérieur à 1";
            }
            if (!is_numeric($game->getMax_players()) || $game->getMax_players() <= $game->getMin_players()) {
                $erreurs[] = "Le nombre maximum de participants doit etre un numero supérieur au nombre minimum de joueurs";
            }

            if (empty($erreurs)) {
                $requete = Bdd::insertBdd("game", $game);

                if ($requete !== null) {
                    if ($requete) {
                        Session::addMessage("success",  "Le jeu a bien été enregistré, pour créer un tournoi cliquez <a class'btn btn-success' href='" . lien("contest", 'insert') . "'> </a>");
                        redirection(lien("game", "list"));
                    } else {
                        Session::addMessage("danger",  "Erreur : le match n'a pas pu etre enregisté");
                    }
                } else {
                    Session::addMessage("danger",  "Erreur SQL");
                }
            }
        }

        $this->affichage("game/form.html.php", [
            "h1" => "Ajouter un jeu",
            "erreurs" => $erreurs ?? null
        ]);
    }
    public function list()
    {
        $games = Bdd::selection("game");


        $this->affichage("game/list.html.php", [
            "h1" => "liste des matchs",
            "games" => $games,
        ]);
    }
}
