<?php
namespace Modeles;

use PDO;
use Modeles\Entites\Livre;
use Modeles\Entites\Abonne;
use Modeles\Entites\EntiteBase;

abstract class Bdd {

    static public function connexion(){
        return new PDO("mysql:host=localhost;dbname=biblio", "root", "");
    }

    /**
     * La fonction selection va retourner tous les enregistrements
     * de la table passée en argument
     * 
     * On peut préciser le type de données retourné par la fonction en
     * l'indiquant après les () et :
     * si on veut que la fonction retourne un type ou null, on ajoute
     * un ? avant le type
     * 
     * La fonction selection() va donc retourner 
     *  soit un array
     *  soit null
     */
    public static function selection(string $table): ?array
    {
        $requete = self::connexion()->query("SELECT * FROM $table");
        if( $requete ){
            $classe = "Modeles\Entites\\" . ucfirst($table);  // ucfirst : majuscule au début de la chaine de caractères
            return $requete->fetchAll(PDO::FETCH_CLASS, $classe);
        }
        return null;
    }


    /**
     * La fonction selectionId() va retourner un enregistrement
     * de la table passée en paramètre ayant pour identifiant la
     * valeur passée en 2ième paramètre
     */
    public static function selectionId(string $table, int $id): ?object
    {
        $requete = self::connexion()->query("SELECT * FROM $table
                                             WHERE id = $id");
        if( $requete && $requete->rowCount() ){
            $classe = "Modeles\Entites\\" . ucfirst($table);
            /* Pour choisir le type qui sera utilisé pour les enregistrements récupérés par la requête, il faut utiliser 
                 la méthode PDOStatement::setFetchMode, si on veut utiliser la méthode PDOStatement::fetch 
                , ⚠ $requete est un objet de la classe PDOStatement */
            $requete->setFetchMode(PDO::FETCH_CLASS, $classe);
            return $requete->fetch();
        }
        return null;
    }

    public static function updateLivre(Livre $livre)
    {
        $texteRequete = "UPDATE livre ";
        $texteRequete .= "SET titre = :titre, auteur = :auteur ";
        $texteRequete .= "WHERE id = :id";
        $requete = self::connexion()->prepare($texteRequete);
        $requete->bindValue(":titre", $livre->getTitre());
        $requete->bindValue(":auteur", $livre->getAuteur());
        $requete->bindValue(":id", $livre->getId());
        return $requete->execute();
    }

    public static function insertLivre(Livre $livre){
        $requete = self::connexion()->prepare("INSERT INTO livre (titre, auteur) 
                                               VALUES (:titre, :auteur)");
        $requete->bindValue(":titre", $livre->getTitre());
        $requete->bindValue(":auteur", $livre->getAuteur());
        
        return $requete->execute();
    }

    public static function suppression(EntiteBase $entite){
        return self::connexion()->exec("DELETE FROM $entite WHERE id = " . $entite->getId());
    }

    public static function nb($table){
        $requete = self::connexion()->query("SELECT COUNT(*) FROM $table");
        return $requete->fetch()[0];
    }

    public static function selectAllEmprunts($nbParPage, $premier = 0)
    {
        $texteRequete = "SELECT e.*, a.pseudo, CONCAT(l.titre, ' - ', l.auteur) AS livre 
                         FROM emprunt e 
                            JOIN abonne a ON e.abonne_id = a.id
                            JOIN livre l ON e.livre_id = l.id
                         ORDER BY date_sortie
                         LIMIT $premier, $nbParPage";
        
        $requete = self::connexion()->query($texteRequete);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public static function abonneParPseudo($pseudo){
        $requete = self::connexion()->prepare("SELECT * FROM abonne WHERE pseudo = :pseudo");
        $requete->bindValue(":pseudo", $pseudo);

        if( $requete->execute() ){
            if( $requete->rowCount() == 1 ){
                $requete->setFetchMode(PDO::FETCH_CLASS, "Modeles\Entites\Abonne");
                return $requete->fetch();
            } else {
                return false;
            }
        } else {
            return null;
        }
    }

    public static function insertAbonne(array $donnees): ?bool
    {
        extract($donnees);

        $texteRequete = "INSERT INTO abonne (pseudo, mdp, nom, prenom) VALUES (";
        $texteRequete .= "'$pseudo', '$mdp', ";
        $texteRequete .= "'" . ($nom ?? null) . "', ";
        $texteRequete .= "'" . ($prenom ?? null) . "')";
        $requete = self::connexion()->exec($texteRequete);
        if( $requete ) {
            if( $requete == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return null;
        }
    }

    public static function updateAbonne(Abonne $abonne) {
        $texteRequete = "UPDATE abonne 
                         SET pseudo = :pseudo, mdp = :mdp, prenom = :prenom, nom = :nom
                         WHERE id = :id";
        $requete = self::connexion()->prepare($texteRequete);
        $requete->bindValue(":pseudo", $abonne->getPseudo());
        $requete->bindValue(":mdp", $abonne->getMdp());
        $requete->bindValue(":prenom", $abonne->getPrenom());
        $requete->bindValue(":nom", $abonne->getNom());
        $requete->bindValue(":id", $abonne->getId());

        return $requete->execute();

    }
}

