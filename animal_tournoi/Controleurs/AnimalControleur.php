<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Session;
use Modeles\Entites\Animal;

class AnimalControleur extends ControleurBase
{
    public function liste()
    {
        $animals = Bdd::selection("animal");

        // AFFICHAGE
        $this->affichage("animal/table.html.php", [
            "animals" => $animals,
            "h1" => "Liste des animals (mvc)"
        ]);
    }

    public function ajouter()
    {
        if ($_POST) {
            $animal = new Animal;
            $animal->setNom($_POST["nom"] ?? null);
            $animal->setMinParticipant($_POST["minParticipant"] ?? null);
            $animal->setMaxParticipant($_POST["maxParticipant"] ?? null);
            $erreurs = [];

            if (empty($animal->getNom())) {
                $erreurs[] = "Le nom ne peut être vide";
            }
            if (strlen($animal->getNom()) < 2) {
                $erreurs[] = "Le nom doit avoir au moins 2 caractères";
            }
            if (strlen($animal->getNom()) > 30) {
                $erreurs[] = "Le nom ne peut avoir plus de 30 caractères";
            }

            if (empty($animal->getMinParticipant())) {
                $erreurs[] = "Le minimum de participant ne peut être vide";
            }
            if (!is_numeric($animal->getMinParticipant())) {
                $erreurs[] = "Le minimum de participant doit etre un nombre";
            }
            if (empty($animal->getMaxParticipant())) {
                $erreurs[] = "Le maximum de participant ne peut être vide";
            }
            if (!is_numeric($animal->getMaxParticipant())) {
                $erreurs[] = "Le maximum de participant doit etre un nombre";
            }

            $animal->setNom(htmlentities($animal->getNom()));

            $animal->setNom(addslashes($animal->getNom()));

            if (empty($erreurs)) {
                if (Bdd::insertAnimal($animal)) {
                    Session::addMessage("success", "Le nouveau animal a bien été enregistré");
                    redirection(lien("animal", "liste"));
                } else {
                    Session::addMessage("danger", "Erreur SQL");
                }
            }
        }

        // AFFICHAGE
        $h1 = "Ajouter un animal";
        $this->affichage("animal/form.html.php", ["h1" => $h1, "erreurs" => $erreurs ?? []]);
    }

    public function modifier($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                $animal = Bdd::selectionId("animal", $id);
                if ($animal) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $animal->setNom($_POST["nom"] ?? null);
                        $animal->setMinParticipant($_POST["minParticipant"] ?? null);
                        $erreurs = [];

                        // Vérification de la validité du formulaire

                        if (empty($animal->getNom())) {
                            $erreurs[] = "Le nom ne peut être vide";
                        }
                        if (strlen($animal->getNom()) < 2) {
                            $erreurs[] = "Le nom doit avoir au moins 2 caractères";
                        }
                        if (strlen($animal->getNom()) > 30) {
                            $erreurs[] = "Le nom ne peut avoir plus de 30 caractères";
                        }

                        if (empty($animal->getMinParticipant())) {
                            $erreurs[] = "Le minimum de participant ne peut être vide";
                        }
                        if (!is_numeric($animal->getMinParticipant())) {
                            $erreurs[] = "Le minimum de participant doit etre un nombre";
                        }
                        if (empty($animal->getMaxParticipant())) {
                            $erreurs[] = "Le maximum de participant ne peut être vide";
                        }
                        if (!is_numeric($animal->getMaxParticipant())) {
                            $erreurs[] = "Le maximum de participant doit etre un nombre";
                        }

                        $animal->setNom(htmlentities($animal->getNom()));

                        $animal->setNom(addslashes($animal->getNom()));

                        if (empty($erreurs)) {
                            if (Bdd::updateAnimal($animal)) {
                                Session::addMessage("success", "Le animal n°$id a bien été modifié");
                                redirection(lien("animal"));
                            } else {
                                Session::addMessage("danger", "Erreur SQL");
                            }
                        }
                    }
                } else {
                    Session::addMessage("danger", "Erreur SQL ou aucun animal ne correspond à cet identifiant");
                    redirection(lien("animal"));
                }
            } else {
                Session::addMessage("danger", "ERREUR 404 : la page demandée n'existe pas");
                redirection(lien("accueil"));
            }
        }

        // AFFICHAGE
        $this->affichage("animal/form.html.php", [
            "animal" => $animal,
            "h1" => "Modifier le animal n°$id"
        ]);
    }

    public function supprimer($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                if ($animal = Bdd::selectionId("animal", $id)) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        if (Bdd::suppression($animal)) {
                            Session::addMessage("success", "Le animal n°$id a bien été supprimé");
                            redirection(lien("animal"));
                        } else {
                            Session::addMessage("danger", "Erreur lors de la tentative de suppression");
                            redirection(lien("animal"));
                        }
                    }
                } else {
                    Session::addMessage("danger", "Erreur SQL ou aucun animal ne correspond à cet identifiant");
                    redirection(lien("animal"));
                }
            } else {
                Session::addMessage("danger", "ERREUR 404 : la page demandée n'existe pas");
            }
        }

        // AFFICHAGE
        $this->affichage("animal/form.html.php", [
            "animal" => $animal,
            "h1" => "Supprimer le animal n°$id ?",
            "mode" => "suppression"
        ]);
    }

    public function fiche($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                $animal = Bdd::selectionId("animal", $id);
                if (!$animal) {
                    Session::addMessage("danger", "Aucun animal ne correspond à cet identifiant");
                    redirection(lien("animal"));
                }
            } else {
                redirection("erreur/404.php");
            }
        } else {
            redirection("erreur/404.php");
        }

        $this->affichage("animal/fiche.html.php", [
            "animal" => $animal,
            "h1" => "Fiche du animal n°$id"
        ]);
    }


    public function debug()
    {
        $animal = Bdd::selectionId("animal", 101);
        debug($animal);

        echo "Identifiant: " . $animal->getId();

        echo "<hr>";
        $eb = new \Modeles\Entites\EntiteBase;
        echo "Classe " . $eb . "<br>";
        echo "Classe de l'objet animal : " . $animal;
        exit;
    }
}
