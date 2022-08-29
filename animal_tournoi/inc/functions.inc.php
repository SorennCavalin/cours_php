<?php
function lien($controleur, $methode = "liste", $id = null) {
    // return ROOT . "?controleur=$controleur&methode=$methode" . ($id ? "&id=$id" : "");
    return ROOT . "$controleur/$methode" . ($id ? "/$id" : "");
}


function debug($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function d_exit($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}



function redirection($url){
    header("Location: $url");
    exit;
}








// ⚠ test
function erreur($num = 404){
    include "erreur/$num.php";
    exit;
}