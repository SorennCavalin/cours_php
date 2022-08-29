<?php

namespace Modeles;

use PDO;
use Modeles\Entites\Bijoux;
use Modeles\Entites\EntiteBase;

abstract class Bdd
{

    static public function connexion()
    {
        return new PDO("mysql:host=localhost;dbname=db_bijoux", "root", "");
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
        if ($requete) {
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
        if ($requete && $requete->rowCount()) {
            $classe = "Modeles\Entites\\" . ucfirst($table);
            /* Pour choisir le type qui sera utilisé pour les enregistrements récupérés par la requête, il faut utiliser 
                 la méthode PDOStatement::setFetchMode, si on veut utiliser la méthode PDOStatement::fetch 
                , ⚠ $requete est un objet de la classe PDOStatement */
            $requete->setFetchMode(PDO::FETCH_CLASS, $classe);
            return $requete->fetch();
        }
        return null;
    }



    public static function updateBijoux(Bijoux $bijoux)
    {
        $texteRequete = "UPDATE bijoux ";
        $texteRequete .= "SET titre = :titre, description = :description, date = :date ";
        $texteRequete .= "WHERE id = :id";
        $requete = self::connexion()->prepare($texteRequete);
        $requete->bindValue(":titre", $bijoux->getTitre());
        $requete->bindValue(":description", $bijoux->getDescription());
        $requete->bindValue(":date", $bijoux->getDate());
        $requete->bindValue(":id", $bijoux->getId());
        return $requete->execute();
    }

    public static function insertBijoux(Bijoux $bijoux)
    {
        $requete = self::connexion()->prepare("INSERT INTO bijoux (titre, description, date) 
                                               VALUES (:titre, :description, :date)");
        $requete->bindValue(":titre", $bijoux->getTitre());
        $requete->bindValue(":description", $bijoux->getDescription());
        $requete->bindValue(":date", $bijoux->getDate());

        return $requete->execute();
    }

    public static function suppression(EntiteBase $entite)
    {
        return self::connexion()->exec("DELETE FROM $entite WHERE id = " . $entite->getId());
    }

    public static function nb($table)
    {
        $requete = self::connexion()->query("SELECT COUNT(*) FROM $table");
        return $requete->fetch()[0];
    }
}
