<?php

namespace Modeles;
use Modeles\Entites\Abonne;

abstract class Session{
    public static function destroy(){
        session_destroy();
    }

    public static function addMessage($type, $message){
        $_SESSION["messages"][$type][] = $message;
    }

    public static function getMessages(){
        $messages = $_SESSION["messages"] ?? null;
        if(isset($_SESSION["messages"])) {
            unset($_SESSION["messages"]);
        }
        return $messages;
    }

    public static function authentication(Abonne $abonne){
        $_SESSION["abonne"] = $abonne;
    }

    public static function isConnected(){
        return $_SESSION["abonne"] ?? false;
    }

    public static function logout(){
        self::destroy();
    }

    public static function isAdmin(): bool
    {
        if( $abonne = self::isConnected() ){
            return $abonne->getNiveau() == NIVEAU_ADMIN;
        } 
        return false;
    }
}