<?php

namespace Modeles;

abstract class Session{

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

}