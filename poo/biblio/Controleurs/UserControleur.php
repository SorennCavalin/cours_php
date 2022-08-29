<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Session as Sess;

class UserControleur extends ControleurBase{
    public function connexion(){
        if( $abonneConnecte = Sess::isConnected() ){
            Sess::addMessage("erreur",  $abonneConnecte->getPseudo() . " , vous êtes déjà connecté");
            redirection( lien("accueil") );
        }
        
        if( $_POST ){
            extract($_POST);
            if( !empty($pseudo) && !empty($mdp) ){
                if( $abonne = Bdd::abonneParPseudo($pseudo) ){
                    if( password_verify($mdp, $abonne->getMdp()) ){
                        Sess::addMessage("succes", "Bonjour $pseudo, vous êtes connecté");
                        Sess::authentication($abonne);
                        redirection("/");
                    } else {
                        Sess::addMessage("erreur", "Le mot de passe ne correspond pas");
                    }
        
                } else {
                    Sess::addMessage("erreur", "Il n'y a pas d'abonné avec ce pseudo");
                }
            } else {
                Sess::addMessage("erreur", "Le pseudo et le mot de passe sont obligatoires");
            }
        }
        
        $this->affichage("user/form_connexion.html.php", [
            "h1" => "Entrez vos identifiants de connexion"
        ]);
    }

    public function deconnexion(){
        session_destroy();
        $_SESSION["succes"] = "Vous êtes déconnecté";
        redirection( lien("accueil") );
    }


}