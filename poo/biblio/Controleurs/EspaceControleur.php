<?php
namespace Controleurs;

use PDO;
use Modeles\Bdd;

class EspaceControleur extends ControleurBase {
    public function abonne()
    {
        if( !connecte() ){
            redirection("/erreur/403.php");
        }
        $abonne = connecte();
        $texteRequete = "SELECT *, CONCAT(l.titre, ' - ', l.auteur) AS livre
                         FROM emprunt e JOIN livre l ON e.livre_id = l.id
                         WHERE abonne_id = " . $abonne["id"];
        $requete = Bdd::connexion()->query($texteRequete);
        if( $requete ){
            $emprunts = $requete->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $emprunts = [];
        }
        
        
        $this->affichage("espace/index.html.php", [
            "abonne" => connecte(),
            "h1" => "Mon espace abonné",
            "emprunts" => $emprunts
        ]);
    }

    public function emprunter($livre_id){
        if( !connecte() ){
            redirection("erreur/403.php");
        }
        
        $abonneConnecte = connecte();
        $abonne_id = $abonneConnecte["id"];
        $date_sortie = date("Y-m-d");
        
        $texteRequete = "INSERT INTO emprunt (date_sortie, livre_id, abonne_id) 
                         VALUES ('$date_sortie', $livre_id, $abonne_id)";
        $requete = Bdd::connexion()->exec($texteRequete);
        if( $requete ){
            $_SESSION["success"] = $abonneConnecte["pseudo"] . ", votre emprunt du " . date("d/m/Y") . " a bien été enregistré";
            redirection( lien("espace", "abonne") );
        } else {
            $_SESSION["erreur"] = "Emprunt impossible";
            redirection( lien("accueil") );
        }
    }
}