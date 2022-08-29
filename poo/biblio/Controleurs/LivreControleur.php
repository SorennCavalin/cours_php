<?php
namespace Controleurs;

use Modeles\Bdd;
use Modeles\Session;
use Modeles\Entites\Livre;

class LivreControleur extends ControleurBase{

    
    public function liste()
    {
        if( !Session::isAdmin() ) {
            redirection("/erreur/403.php");
        }
        
        $livres = Bdd::selection("livre");
        
        // AFFICHAGE
        $this->affichage("livre/table.html.php", [
            "livres" => $livres,
            "h1" => "Liste des livres (mvc)"
        ]);
                
    }

    public function ajouter() {
        if( !Session::isAdmin() ) {
            redirection("/erreur/403.php");
        }
        if( $_POST ) {
            $livre = new Livre;
            $livre->setTitre($_POST["titre"] ?? null);
            $livre->setAuteur($_POST["auteur"] ?? null);
            $erreurs = [];
        
            if( empty($livre->getTitre()) ) {
               $erreurs[] = "Le titre ne peut être vide";
            }
            if( strlen($livre->getTitre()) < 2 ) {
               $erreurs[] = "Le titre doit avoir au moins 2 caractères";
            }
            if( strlen($livre->getTitre()) > 30 ) {
                $erreurs[] = "Le titre ne peut avoir plus de 30 caractères";
            }
            
            if( empty($livre->getAuteur()) ) {
                $erreurs[] = "L'auteur ne peut être vide";
            }
            if( strlen($livre->getAuteur()) < 4 ) {
                $erreurs[] = "L'auteur doit avoir au moins 4 caractères";
            }
            if( strlen($livre->getAuteur()) > 30 ) {
                $erreurs[] = "L'auteur ne peut avoir plus de 30 caractères";
            }
        
            $livre->setTitre(htmlentities($livre->getTitre()));

            $auteur = $livre->getAuteur();
            $auteur = htmlentities($auteur);
            $livre->setAuteur($auteur);
        
            $livre->setTitre( addslashes($livre->getTitre()) );
            $livre->setAuteur( addslashes($livre->getAuteur()) );
        
            if( empty($erreurs) ){
                if( Bdd::insertLivre($livre) ){
                    Session::addMessage("success", "Le nouveau livre a bien été enregistré");
                    redirection( lien("livre", "liste") );
                } else {
                   Session::addMessage("danger", "Erreur SQL");
                }
            }
        }
        
        // AFFICHAGE
        $h1 = "Ajouter un livre";
        $this->affichage("livre/form.html.php", [ "h1" => $h1, "erreurs" => $erreurs ?? [] ]);
    }

    public function modifier($id){
        if( !Session::isAdmin() ) {
            redirection("/erreur/403.php");
        }
        
        if( $id ) {
            if( is_numeric($id) ){
                $livre = Bdd::selectionId("livre", $id);
                if( $livre ) {
                    if( $_SERVER["REQUEST_METHOD"] == "POST" ){
                        $livre->setTitre($_POST["titre"] ?? null);
                        $livre->setAuteur($_POST["auteur"] ?? null);
                        $erreurs = [];
                    
                        // Vérification de la validité du formulaire
                        if( empty($livre->getTitre()) ) {
                           $erreurs[] = "Le titre ne peut être vide";
                        }
                        if( strlen($livre->getTitre()) < 2 ) {
                           $erreurs[] = "Le titre doit avoir au moins 2 caractères";
                        }
                        if( strlen($livre->getTitre()) > 30 ) {
                            $erreurs[] = "Le titre ne peut avoir plus de 30 caractères";
                        }
                        
                        if( empty($livre->getAuteur()) ) {
                            $erreurs[] = "L'auteur ne peut être vide";
                        }
                        if( strlen($livre->getAuteur()) < 4 ) {
                            $erreurs[] = "L'auteur doit avoir au moins 2 caractères";
                        }
                        if( strlen($livre->getAuteur()) > 30 ) {
                            $erreurs[] = "L'auteur ne peut avoir plus de 30 caractères";
                        }
                    
                        $livre->setTitre(htmlentities($livre->getTitre()));
                        $livre->setAuteur(htmlentities( $livre->getAuteur()));
                        $livre->setTitre( addslashes($livre->getTitre()) );
                        $livre->setAuteur( addslashes($livre->getAuteur()) );
                                
                        if( empty($erreurs) ){
                            if( Bdd::updateLivre($livre) ){
                                Session::addMessage("success", "Le livre n°$id a bien été modifié");
                                redirection(lien("livre"));
                            } else {
                                Session::addMessage("danger", "Erreur SQL");
                            }
                        }
                    }
                } else {
                    Session::addMessage("danger", "Erreur SQL ou aucun livre ne correspond à cet identifiant");
                    redirection(lien("livre"));
                }
            } else {
                Session::addMessage("danger", "ERREUR 404 : la page demandée n'existe pas");
                redirection(lien("accueil"));
            }
        }
        
        // AFFICHAGE
        $this->affichage("livre/form.html.php", [
            "livre" => $livre,
            "h1" => "Modifier le livre n°$id"
        ]);        
    }

    public function supprimer($id){
        if( !Session::isAdmin() ) {
            redirection("/erreur/403.php");
        }
        
        if( $id ) {
            if( is_numeric($id) ){
                if( $livre = Bdd::selectionId("livre", $id) ) {
                    if( $_SERVER["REQUEST_METHOD"] == "POST" ){
                       
                        if( Bdd::suppression($livre) ) {
                            Session::addMessage("success", "Le livre n°$id a bien été supprimé");
                            redirection( lien("livre") );
                        } else {
                            Session::addMessage("danger", "Erreur lors de la tentative de suppression");
                            redirection( lien("livre") );
                        }
                    }
                } else {
                    Session::addMessage("danger", "Erreur SQL ou aucun livre ne correspond à cet identifiant");
                    redirection( lien("livre") );
                }
            } else {
                Session::addMessage("danger", "ERREUR 404 : la page demandée n'existe pas");
            }
        }
        
        // AFFICHAGE
        $this->affichage("livre/form.html.php",[
            "livre" => $livre,
            "h1" => "Supprimer le livre n°$id ?",
            "mode" => "suppression"
        ]);        
    }

    public function fiche($id)
    {
        if( $id ) {
            if( is_numeric($id) ){
                $livre = Bdd::selectionId("livre", $id);
                if( !$livre ){
                    $_SESSION["erreur"] = "Aucun livre ne correspond à cet identifiant";
                    redirection("/");
                }
            } else {
                redirection("erreur/404.php");
            }
        } else {
            redirection("erreur/404.php");
        }
        
        $this->affichage("livre/fiche.html.php", [ 
            "livre" => $livre, 
            "h1" => "Fiche du livre n°$id" 
        ]);        
    }


    public function debug(){
        $livre = Bdd::selectionId("livre", 101);
        debug($livre); 
        
        echo "Identifiant: " . $livre->getId();

        echo "<hr>";
        $eb = new \Modeles\Entites\EntiteBase;
        echo "Classe " . $eb . "<br>";
        echo "Classe de l'objet livre : " . $livre;
        exit;
    }
}