<?php

namespace Controlers;

use PDO;
use Modeles\Bdd;
use Modeles\Session;
use Controlers\Controler;
use Modeles\Entities\Contest;
use Modeles\Entities\Player_contest;

class ContestControler extends Controler
{

    public function insert()
    {
        $contest = new Contest;
        if ($_POST) {
            $contest->setGame_id($_POST["game_id"] ?? null);
            $contest->setStart_date($_POST["start_date"] ?? null);
            $jeux = $contest->getJeux();
            $erreurs = [];

            // Vérification de la validité du formulaire
            if (empty($contest->getGame_id())) {
                $erreurs[] = "Veuillez choisir un jeu";
            }
            $exist = false;
            foreach ($jeux as $jeu) {

                if ($contest->getGame_id() == $jeu["id"]) {
                    $exist = true;
                    break;
                };
            }
            if ($exist === false) {
                $erreurs[] = "ce jeux n'existe pas";
            }

            if (empty($contest->getStart_date())) {
                $erreurs[] = "le jeux doit bien commencer un jour ...";
            }

            if (empty($erreurs)) {
                $requete = Bdd::insertBdd("contest", $contest);

                if ($requete !== null) {
                    if ($requete) {

                        Session::addMessage("success",  "Le match à bien été enregistré, pour inscrire un joueur a ce match, cliquez <a class='btn btn-success' href='" . lien('contest') . "'>ici</a> ");
                        redirection(lien("constest", "list"));
                    } else {
                        Session::addMessage("danger",  "Erreur : le match n'a pas pu etre enregisté");
                    }
                } else {
                    Session::addMessage("danger",  "Erreur SQL");
                }
            }
        }

        $this->affichage("contest/form.html.php", [
            "h1" => "Ajouter un match",
            "jeux" => $contest->getJeux(),
            "erreurs" => $erreurs ?? null
        ]);
    }
    public function list()
    {
        $contest = Bdd::selection("contest");
        $contest = array_reverse($contest);
        $jeux = $contest[0]->getJeux();


        $this->affichage("contest/list.html.php", [
            "h1" => "liste des matchs",
            "matchs" => $contest,
            "jeux" => $jeux
        ]);
    }
    public function infos()
    {


        $contest = Bdd::selectionId("contest", $_GET["id"]);
        if (!empty($_POST)) {
            $player_contest = new Player_contest;
            $player_contest->setPlayer_id($_POST["player_id"]);
            $player_contest->setContest_id($contest->getId());
            $request = Bdd::insertBdd("player_contest", $player_contest);
        }

        if (empty($_GET["id"])) {
            redirection("/");
        }
        $jeux = $contest->getJeux();
        foreach ($jeux as $jeu) {
            if ($jeu["id"] == $contest->getGame_id()) {
                $jeux = $jeu;
            }
        }
        $this->affichage(
            "contest/match.html.php",
            [
                "h1" => "Page du tournoi",
                "contest" => $contest,
                "jeux" => $jeux,
                "players" => Bdd::selection("player")
            ]
        );
    }
}
