<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Session;
use Modeles\Entites\Bijoux;

class BijouxControleur extends ControleurBase
{
    public function liste()
    {
        $bijouxs = Bdd::selection("bijoux");

        // AFFICHAGE
        $this->affichage("bijoux/table.html.php", [
            "bijouxs" => $bijouxs,
            "h1" => "Liste des bijouxs (mvc)"
        ]);
    }

    public function ajouter()
    {
        if ($_POST) {
            $bijoux = new Bijoux;
            $bijoux->setTitre($_POST["titre"] ?? null);
            $bijoux->setDescription($_POST["description"] ?? null);
            $bijoux->setDate($_POST["date"] ?? null);
            $erreurs = [];

            if (empty($bijoux->getTitre())) {
                $erreurs[] = "Le titre ne peut être vide";
            }
            if (strlen($bijoux->getTitre()) < 2) {
                $erreurs[] = "Le titre doit avoir au moins 2 caractères";
            }
            if (strlen($bijoux->getTitre()) > 30) {
                $erreurs[] = "Le titre ne peut avoir plus de 30 caractères";
            }

            if (empty($bijoux->getDescription())) {
                $erreurs[] = "L'description ne peut être vide";
            }
            if (strlen($bijoux->getDescription()) < 4) {
                $erreurs[] = "L'description doit avoir au moins 4 caractères";
            }
            if (empty($bijoux->getDescription())) {
                $erreurs[] = "La description ne peut être vide";
            }
            if (empty($bijoux->getDate())) {
                $erreurs[] = "La date ne peut être vide";
            }
            

            $bijoux->setTitre(htmlentities($bijoux->getTitre()));
            $bijoux->setDescription(htmlentities($bijoux->getDescription()));
            $bijoux->setDate(htmlentities($bijoux->getDate()));
            
            $bijoux->setTitre(addslashes($bijoux->getTitre()));
            $bijoux->setDescription(addslashes($bijoux->getDescription()));
            $bijoux->setDate(addslashes($bijoux->getDate()));

            if (empty($erreurs)) {
                if (Bdd::insertBijoux($bijoux)) {
                    Session::addMessage("success", "Le nouveau bijoux a bien été enregistré");
                    redirection(lien("bijoux", "liste"));
                } else {
                    Session::addMessage("danger", "Erreur SQL");
                }
            }
        }

        // AFFICHAGE
        $h1 = "Ajouter un bijoux";
        $this->affichage("bijoux/form.html.php", ["h1" => $h1, "erreurs" => $erreurs ?? []]);
    }

    public function modifier($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                $bijoux = Bdd::selectionId("bijoux", $id);
                if ($bijoux) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $bijoux->setTitre($_POST["titre"] ?? null);
                        $bijoux->setDescription($_POST["description"] ?? null);
                        $erreurs = [];

                        // Vérification de la validité du formulaire
                        if (empty($bijoux->getTitre())) {
                            $erreurs[] = "Le titre ne peut être vide";
                        }
                        if (strlen($bijoux->getTitre()) < 2) {
                            $erreurs[] = "Le titre doit avoir au moins 2 caractères";
                        }
                        if (strlen($bijoux->getTitre()) > 30) {
                            $erreurs[] = "Le titre ne peut avoir plus de 30 caractères";
                        }

                        if (empty($bijoux->getDescription())) {
                            $erreurs[] = "L'description ne peut être vide";
                        }
                        if (strlen($bijoux->getDescription()) < 4) {
                            $erreurs[] = "L'description doit avoir au moins 2 caractères";
                        }
                        if (strlen($bijoux->getDescription()) > 30) {
                            $erreurs[] = "L'description ne peut avoir plus de 30 caractères";
                        }

                        $bijoux->setTitre(htmlentities($bijoux->getTitre()));
                        $bijoux->setDescription(htmlentities($bijoux->getDescription()));
                        $bijoux->setTitre(addslashes($bijoux->getTitre()));
                        $bijoux->setDescription(addslashes($bijoux->getDescription()));

                        if (empty($erreurs)) {
                            if (Bdd::updateBijoux($bijoux)) {
                                Session::addMessage("success", "Le bijoux n°$id a bien été modifié");
                                redirection(lien("bijoux"));
                            } else {
                                Session::addMessage("danger", "Erreur SQL");
                            }
                        }
                    }
                } else {
                    Session::addMessage("danger", "Erreur SQL ou aucun bijoux ne correspond à cet identifiant");
                    redirection(lien("bijoux"));
                }
            } else {
                Session::addMessage("danger", "ERREUR 404 : la page demandée n'existe pas");
                redirection(lien("accueil"));
            }
        }

        // AFFICHAGE
        $this->affichage("bijoux/form.html.php", [
            "bijoux" => $bijoux,
            "h1" => "Modifier le bijoux n°$id"
        ]);
    }

    public function supprimer($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                if ($bijoux = Bdd::selectionId("bijoux", $id)) {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        if (Bdd::suppression($bijoux)) {
                            Session::addMessage("success", "Le bijoux n°$id a bien été supprimé");
                            redirection(lien("bijoux"));
                        } else {
                            Session::addMessage("danger", "Erreur lors de la tentative de suppression");
                            redirection(lien("bijoux"));
                        }
                    }
                } else {
                    Session::addMessage("danger", "Erreur SQL ou aucun bijoux ne correspond à cet identifiant");
                    redirection(lien("bijoux"));
                }
            } else {
                Session::addMessage("danger", "ERREUR 404 : la page demandée n'existe pas");
            }
        }

        // AFFICHAGE
        $this->affichage("bijoux/form.html.php", [
            "bijoux" => $bijoux,
            "h1" => "Supprimer le bijoux n°$id ?",
            "mode" => "suppression"
        ]);
    }

    public function fiche($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                $bijoux = Bdd::selectionId("bijoux", $id);
                if (!$bijoux) {
                    Session::addMessage("danger", "Aucun bijoux ne correspond à cet identifiant");
                    redirection(lien("bijoux"));
                }
            } else {
                redirection("erreur/404.php");
            }
        } else {
            redirection("erreur/404.php");
        }

        $this->affichage("bijoux/fiche.html.php", [
            "bijoux" => $bijoux,
            "h1" => "Fiche du bijoux n°$id"
        ]);
    }


    public function debug()
    {
        $bijoux = Bdd::selectionId("bijoux", 101);
        debug($bijoux);

        echo "Identifiant: " . $bijoux->getId();

        echo "<hr>";
        $eb = new \Modeles\Entites\EntiteBase;
        echo "Classe " . $eb . "<br>";
        echo "Classe de l'objet bijoux : " . $bijoux;
        exit;
    }
}
