<?php

namespace Modeles;

use PDO;

abstract class Bdd
{

    static public function connection(): Object
    {
        return new PDO("mysql:host=localhost;dbname=wf3_php_final_sorenn", "root", "");
    }
    public static function selectionId(string $table, int $id): Object
    {
        $class = "Modeles\Entities\\" . ucfirst($table);
        $request = self::connection()->query("SELECT * FROM $table WHERE id = $id");
        $request->setfetchmode(PDO::FETCH_CLASS, $class);
        return $request->fetch();
    }
    static public function selection(string $table)
    {
        $class = "Modeles\Entities\\" . ucfirst($table);
        $request = self::connection()->query("SELECT * FROM $table");
        $request->setFetchMode(PDO::FETCH_CLASS, $class);
        return $request->fetchall();
    }
    static public function insertBdd(string $table, Object $object): bool
    {
        $textOfRequest = "";
        switch ($table) {
            case "contest":
                $textOfRequest .= "INSERT INTO $table (game_id,start_date) VALUES (:game_id,:start_date)";
                $request =  self::connection()->prepare($textOfRequest);
                $request->bindValue(":game_id", $object->getGame_id());
                $request->bindValue(":start_date", $object->getStart_date());
                if ($request->execute()) {
                    return true;
                } else {
                    return false;
                }
                break;
            case "game":
                $textOfRequest .= "INSERT INTO $table (title,min_players,max_players) VALUES (:title,:min_players,:max_players)";
                $request =  self::connection()->prepare($textOfRequest);
                $request->bindValue(":title", $object->getTitle());
                $request->bindValue(":min_players", $object->getMin_players());
                $request->bindValue(":max_players", $object->getMax_players());
                if ($request->execute()) {
                    return true;
                } else {
                    return false;
                }
                break;
            case "player":
                $textOfRequest .= "INSERT INTO $table (email,nickname) VALUES (:email,:nickname)";
                $request =  self::connection()->prepare($textOfRequest);
                $request->bindValue(":email", $object->getEmail());
                $request->bindValue(":nickname", $object->getNickname());
                if ($request->execute()) {
                    return true;
                } else {
                    return false;
                }
                break;
            case "player_contest":
                $textOfRequest .= "INSERT INTO $table (player_id,contest_id) VALUES (:player_id,:contest_id)";
                $request = self::connection()->prepare($textOfRequest);
                $request->bindValue(":player_id", $object->getPlayer_id());
                $request->bindValue(":contest_id", $object->getContest_id());
                if ($request->execute()) {
                    return true;
                } else {
                    return false;
                }
                break;
            default:
                return false;
        }
    }
}
