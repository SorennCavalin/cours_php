<?php

function debug($var, $exit = false){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    if( $exit ){
        exit();
    }
}

function redirection($url){
    header("Location: $url");
    exit;
}

function menuActif($href){
    $urlActuelle = $_SERVER["REQUEST_URI"]; // /afficher.php?id=45
    $position = strpos($urlActuelle, $href);
    return $position !== false;
}

function extrait($texte, $longueur) {
    $suffixe = strlen($texte) > $longueur ? "..." : "";
    return substr($texte, 0, $longueur) . $suffixe;
}