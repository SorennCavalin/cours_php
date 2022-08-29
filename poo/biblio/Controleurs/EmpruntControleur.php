<?php

namespace Controleurs;

use Modeles\Bdd;
class EmpruntControleur extends ControleurBase {
    public function liste()
    {
        if( !connecteAdmin() ) {
            redirection("/erreur/403.php");
        }
        
        $page = empty($_GET["page"]) ? 1 : $_GET["page"];
        $nbParPage = 3;
        $premier = ($page - 1) * $nbParPage;

        $emprunts = Bdd::selection("emprunt");
        $nbLignes = count($emprunts);

        $pageMax =  ceil($nbLignes / $nbParPage);  //fonction ceil : arrondi au nombre supérieur
        
        // $emprunts = Bdd::selectAllEmprunts($nbParPage, $premier);

        $this->affichage("emprunt/table.html.php", [
            "emprunts" => $emprunts,
            "h1" => "Liste des emprunts $page/$pageMax",
            "pageMax" => $pageMax
        ]);    
    }

    public function ajouter(){
        if( !connecteAdmin() ) {
            redirection("/erreur/403.php");
        }
        if( $_POST ){
            extract($_POST);
            if( empty($date_sortie) ) {
                $erreurs[] = "La date de sortie est obligatoire";
            }
        
            if( empty($livre_id) ){
                $erreurs[] = "Vous devez choisir un livre";
            }
        
            if( empty($abonne_id) ){
                $erreurs[] = "Vous devez choisir un abonné";
            }
        
            if( empty($erreurs) ){
                $texteRequete = "INSERT INTO emprunt ";
                $texteRequete .= "(date_sortie, livre_id, abonne_id";
                if( !empty($date_rendu) ){
                    $texteRequete .= ", date_rendu";
                }
                $texteRequete .= ") VALUES ('$date_sortie', $livre_id, $abonne_id";
                if( !empty($date_rendu) ){
                    $texteRequete .= ", '$date_rendu'";
                }
                $texteRequete .= ")";
                
                $requete = Bdd::connexion()->query( $texteRequete );
                if( $requete && $requete->rowCount() == 1 ) {
                    $_SESSION["succes"] = "L'emprunt a bien été ajouté";
                    redirection("emprunt_liste.php");
                } else {
                    $_SESSION["erreur"] = "Erreur SQL lors de l'insertion";
                }
            }
        }
        
        
        $this->affichage("emprunt/form.html.php", [
            "h1"        => "Ajouter un emprunt",
            "abonnes"   => Bdd::selection("abonne"),
            "livres"    => Bdd::selection("livre"),
            "erreurs"   => $erreurs ?? null
        ]);
    }

    public function modifier($id){
        if( !connecteAdmin() ) {
            redirection("/erreur/403.php");
        }
           
        if( $id && is_numeric($id) ) {
            $emprunt = Bdd::selectionId("emprunt", $id);
            if( $emprunt ){
                if( $_POST ){
                    extract($_POST);
                    if( empty($date_sortie) ) {
                        $erreurs[] = "La date de sortie est obligatoire";
                    }
        
                    if( empty($livre_id) ){
                        $erreurs[] = "Vous devez choisir un livre";
                    }
        
                    if( empty($abonne_id) ){
                        $erreurs[] = "Vous devez choisir un abonné";
                    }
        
                    if( empty($erreurs) ){
                        if( empty($date_rendu) ){
                            $texteRequete = "UPDATE emprunt
                                            SET date_sortie = '$date_sortie',
                                                livre_id = $livre_id,
                                                abonne_id = $abonne_id
                                            WHERE id = $id";
                        } else {
                            $texteRequete = "UPDATE emprunt
                                            SET date_sortie = '$date_sortie',
                                                date_rendu = '$date_rendu',
                                                livre_id = $livre_id,
                                                abonne_id = $abonne_id
                                            WHERE id = $id";
                        }
                        $requete = Bdd::connexion()->exec($texteRequete);
                        if( $requete ){
                            $_SESSION["succes"] = "L'emprunt n°$id a été modifié";
                            redirection("emprunt_liste.php");
                        } else {
                            $_SESSION["erreur"] = "Erreur SQL";
                        }
                    }
        
                }        
            } else {
                $_SESSION["erreur"] = "Il n'y a pas d'emprunt avec cet identifiant";
                redirection("emprunt_liste.php");
            }
        } else {
            $_SESSION["erreur"] = "Erreur 404 : La page demandée n'existe pas";
            redirection("emprunt_liste.php");
        }
        
        $this->affichage("emprunt/form.html.php", [
            "h1" => "Modifier l'emprunt n°$id",
            "emprunt" => $emprunt,
            "erreurs" => $erreurs ?? null,
            "abonnes"   => Bdd::selection("abonne"),
            "livres"    => Bdd::selection("livre"),
        ]);
    }

    public function supprimer($id){
        
    }
}