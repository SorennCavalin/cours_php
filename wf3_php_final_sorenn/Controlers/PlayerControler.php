<?php

namespace Controlers;

use Modeles\Bdd;
use Modeles\Session;
use Controlers\Controler;
use Modeles\Entities\Player;


class PlayerControler extends Controler
{
    public function insert()
    {
        $player = new Player;
        if ($_POST) {
            $player->setEmail(htmlentities(addslashes($_POST["email"])) ?? null);
            $player->setNickname(htmlentities(addslashes($_POST["nickname"])) ?? null);
            $erreurs = [];

            // Vérification de la validité du formulaire

            if (empty($player->getNickname())) {
                $erreurs[] = "Veuillez entrer un pseudo pour vous enregistrer";
            }
            if (strlen($player->getNickname()) > 40) {
                $erreurs[] = "Votre pseudo est trop long, raccourcissez le je vous pris";
            }

            if (empty($player->getEmail())) {
                $erreurs[] = "Nous avons besoin de votre email pour vois contacter";
            } elseif (filter_var($player->getEmail(), FILTER_VALIDATE_EMAIL) === false) {
                $erreurs[] = "Cette addresse email n'est pas valide";
            }
            if (strlen($player->getEmail()) > 80) {
                $erreurs[] = "Votre addresse mail est trop longue";
            }

            if (empty($erreurs)) {
                $requete = Bdd::insertBdd("player", $player);

                if ($requete !== null) {
                    if ($requete) {

                        Session::addMessage("success",  "Vous etes a présent un joueur reconnu par Game center");
                        redirection(lien("player", "list"));
                    } else {
                        Session::addMessage("danger",  "Il y a eu une erreur lors de votre inscription");
                    }
                } else {
                    Session::addMessage("danger",  "Erreur SQL");
                }
            }
        }

        $this->affichage("player/form.html.php", [
            "h1" => "Inscription de joueur",
            "erreurs" => $erreurs ?? null
        ]);
    }
    public function list()
    {
        $player = Bdd::selection("player");


        $this->affichage("player/list.html.php", [
            "h1" => "liste des matchs",
            "players" => $player,
        ]);
    }
}
