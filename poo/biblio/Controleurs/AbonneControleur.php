<?php
namespace Controleurs;

use PDO;
use Modeles\Bdd;
use Modeles\Session;
use Modeles\Entites\Abonne;

class AbonneControleur extends ControleurBase {
    public function liste() {
        if( !Session::isAdmin() ) {
            redirection("/erreur/403.php");
        }
        $abonnes = Bdd::selection("abonne");
                
        $this->affichage("abonne/table.html.php", [
            "h1" => "Liste des abonnés",
            "abonnes" => $abonnes
        ]);        
    }

    public function ajouter(){
        if( !Session::isAdmin() ) {
            redirection("/erreur/403.php");
        }
        $abonne = new Abonne;
        if( $_POST ) {
            extract($_POST);
            
            $erreurs = [];
        
            // Vérification de la validité du formulaire
            if( empty($pseudo) ) {
               $erreurs[] = "Le pseudo ne peut pas être vide";
            }
            if( strlen($pseudo) < 4 ) {
               $erreurs[] = "Le pseudo doit avoir au moins 4 caractères";
            }
            if( strlen($pseudo) > 20 ) {
                $erreurs[] = "Le pseudo ne peut avoir plus de 20 caractères";
            }
        
            if( !strpos($pseudo, " ") === false ){
                $erreurs[] = "Les espaces ne sont pas autorisés pour le pseudo";
            }
        
            // Est-ce que le pseudo existe déjà dans la bdd ?
            $requete = $connexion->query("SELECT * FROM abonne WHERE pseudo = '$pseudo'");
            if( $requete && $requete->rowCount() ){
                $erreurs[] = "Le pseudo existe déjà, veuillez en choisir un nouveau";
            }
        
            if( !empty($nom) ) { 
                if( strlen($nom) < 2 ) {
                    $erreurs[] = "Le nom doit avoir au moins 2 caractères";
                }
                if( strlen($nom) > 30 ) {
                    $erreurs[] = "Le nom ne peut avoir plus de 30 caractères";
                }
            }
            if( !empty($prenom) ) { 
                if( strlen($prenom) < 2 ) {
                    $erreurs[] = "Le prénom doit avoir au moins 2 caractères";
                }
                if( strlen($prenom) > 30 ) {
                    $erreurs[] = "Le prénom ne peut avoir plus de 30 caractères";
                }
            }
            if( empty($mdp) ){
                $erreurs[] = "Le mot de passe ne peut pas être vide";
            }
        
            /*
            $mdp = trim($mdp); // la fonction trim supprime les espaces au début et à la fin d'une chaîne de caractères
            if( strlen($mdp) < 5 || strlen($mdp) > 10 ){
                $erreurs[] = "Le mot passe doit contenir entre 5 et 10 caratères";
            } else {
                $caracteres = str_split($mdp, 1);
                $minusucle = false;
                $majuscule = false;
                $chiffre = false;
                $special = false;
                foreach($caracteres as $car){
                    if( $car >= 'a' && $car <= 'z' ){
                        $minusucle = true;
                    }
        
                    if( $car >= 'A' && $car <= 'Z' ){
                        $majuscule = true;
                    }
        
                    if( $car >= '0' && $car <= '9' ){
                        $chiffre = true;
                    }
                    if( in_array($car, ['@', '+', '*', '=', '/' ]) ){
                        $special = true;
                    }
                }
                if( !$minusucle || !$majuscule || !$chiffre || !$special ){
                    $erreurs[] = "Le mot de passe doit contenir au mois 1 minuscule, 1 majuscule, 1 chiffre, 1 caractère spécial parmi @+/*=";
                }
            }
            */
        
            if( empty($erreurs) ){
                $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                $donnees["mdp"] = $mdp;
                $donnees["pseudo"] = $pseudo;
                $donnees["nom"] = $nom ?? null;
                $donnees["prenom"] = $prenom ?? null;
                $requete = Bdd::insertAbonne( $donnees );

                if( $requete !== null ) {
                    if( $requete ){
                        Session::addMessage("success",  "Le nouvel abonné a bien été enregistré");
                        redirection( lien("abonne", "liste") );
                    } else {
                        Session::addMessage("danger",  "Erreur : l'abonné n'a pas été enregisté");
                    }
                } else {
                    Session::addMessage("danger",  "Erreur SQL");
                }
            } else {
                $abonne = $_POST;
                $abonne["mdp"] = "";
            }
        }
        
        $this->affichage("abonne/form.html.php", [
            "h1" => "Ajouter un nouvel abonné",
            "abonne" => $abonne,
            "erreurs" => $erreurs ?? null
        ]);
        
    }

    public function modifier($id){
        if( !Session::isAdmin() ) {
            redirection("/erreur/403.php");
        }
        
        if( $id ) {
            if( is_numeric($id) ){
                if( $abonne = Bdd::selectionId("abonne", $id) ){
                    if( $_POST ) {
                        extract($_POST);
                        
                        $erreurs = [];
                    
                        // Vérification de la validité du formulaire
                        if( empty($pseudo) ) {
                           $erreurs[] = "Le pseudo ne peut pas être vide";
                        }
                        if( strlen($pseudo) < 4 ) {
                           $erreurs[] = "Le pseudo doit avoir au moins 4 caractères";
                        }
                        if( strlen($pseudo) > 20 ) {
                            $erreurs[] = "Le pseudo ne peut avoir plus de 20 caractères";
                        }
                    
                        if( !strpos($pseudo, " ") === false ){
                            $erreurs[] = "Les espaces ne sont pas autorisés pour le pseudo";
                        }
                    
                        // Est-ce que le pseudo existe déjà dans la bdd ?
                        // $requete = $connexion->query("SELECT * FROM abonne WHERE pseudo = '$pseudo'");
                        // if( $requete && $requete->rowCount() ){
                        //     $erreurs[] = "Le pseudo existe déjà, veuillez en choisir un nouveau";
                        // }
                    
                        if( !empty($nom) ) { 
                            if( strlen($nom) < 2 ) {
                                $erreurs[] = "Le nom doit avoir au moins 2 caractères";
                            }
                            if( strlen($nom) > 30 ) {
                                $erreurs[] = "Le nom ne peut avoir plus de 30 caractères";
                            }
                        }
                        if( !empty($prenom) ) { 
                            if( strlen($prenom) < 2 ) {
                                $erreurs[] = "Le prénom doit avoir au moins 2 caractères";
                            }
                            if( strlen($prenom) > 30 ) {
                                $erreurs[] = "Le prénom ne peut avoir plus de 30 caractères";
                            }
                        }
        
                        if( empty($mdp) && empty($abonne->getMdp()) ){
                            $erreurs[] = "Le mot de passe ne peut pas être vide";
                        } 
                        /*
                        if( !empty($mdp) ){
                            $mdp = trim($mdp); // la fonction trim supprime les espaces au début et à la fin d'une chaîne de caractères
                            if( strlen($mdp) < 5 || strlen($mdp) > 10 ){
                                $erreurs[] = "Le mot passe doit contenir entre 5 et 10 caratères";
                            } else {
                                $caracteres = str_split($mdp, 1);
                                $minusucle = false;
                                $majuscule = false;
                                $chiffre = false;
                                $special = false;
                                foreach($caracteres as $car){
                                    if( $car >= 'a' && $car <= 'z' ){
                                        $minusucle = true;
                                    }
                        
                                    if( $car >= 'A' && $car <= 'Z' ){
                                        $majuscule = true;
                                    }
                        
                                    if( $car >= '0' && $car <= '9' ){
                                        $chiffre = true;
                                    }
                                    if( in_array($car, ['@', '+', '*', '=', '/' ]) ){
                                        $special = true;
                                    }
                                }
                                if( !$minusucle || !$majuscule || !$chiffre || !$special ){
                                    $erreurs[] = "Le mot de passe doit contenir au mois 1 minuscule, 1 majuscule, 1 chiffre, 1 caractère spécial parmi @+/*=";
                                }
                            }
                        }
                        */
                        if( empty($erreurs) ){
                            if( empty($mdp) ){
                                $mdp = $abonne->getMdp();
                            } else {
                                $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                            }

                            $abonne->setPseudo( $pseudo );
                            $abonne->setMdp( $mdp );
                            $abonne->setNom( $nom ?? null );       // le nom et le prénom peuvent être vides ou ne pas être définis
                            $abonne->setPrenom( $prenom ?? null );

                            if( Bdd::updateAbonne($abonne) ) {
                                Session::addMessage("success",  "L'abonné n°$id a bien été modifié");
                                redirection( lien("abonne", "liste") );
                            } else {
                                Session::addMessage("danger",  "Erreur SQL");
                            }
                        }
                    }
                    
                }
        
            }
        }
        
        $this->affichage("abonne/form.html.php", [
            "h1" => "Modifier l'abonné n°$id",
            "abonne" => $abonne,
            "erreurs" => $erreurs ?? null
        ]);
    }

    public function supprimer($id){
        if( !Session::isAdmin() ) {
            redirection("/erreur/403.php");
        }
        if( $id ) {
            if(is_numeric($id)){
                if( $abonne = Bdd::selectionId("abonne", $id) ){
                    if( $_SERVER["REQUEST_METHOD"] == "POST"){
                        if( Bdd::suppression($abonne) ) {
                            Session::addMessage("success",  "L'abonné n°$id a bien été supprimé");
                            redirection( lien("abonne", "liste") );
                        } else {
                            Session::addMessage("danger",  "Erreur lors de la tentative de suppression");
                        }
                    }
                } else {
                    Session::addMessage("danger",  "Erreur SQL ou pas d'abonné avec cet identifiant");
                    redirection( lien("abonne", "liste") );
                }
            } else {
                Session::addMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
            }
        } else {
            Session::addMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
        }
        
        $this->affichage("abonne/form.html.php", [
            "h1" => "Suppresion de l'abonné n°$id ?",
            "abonne" => $abonne,
            "mode" => "suppression"
        ]);
    }

    public function fiche($id){
        if( !Session::isAdmin() ) {
            redirection("/erreur/403.php");
        }
        if( $id ){
            if( is_numeric($id) ) {
                if( $abonne = Bdd::selectionId("abonne", $id) ){

                } else {
                    Session::addMessage("danger",  "Il n'y a pas d'abonné avec cet identifiant");
                }
            } else {
                Session::addMessage("danger",  "Erreur 404 : cette page n'existe pas");
            }
        } else {
            Session::addMessage("danger",  "Erreur 403 : vous n'avez pas accès à cet URL");
            redirection( lien("abonne", "liste") );
        }
        
        $this->affichage("abonne/fiche.html.php", [ 
            "abonne" => $abonne,
            "h1" => "Fiche abonné"
        ]);
        
    }
}