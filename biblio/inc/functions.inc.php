<?php

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

function affichage($fichier, array $parametres = []){
    // $titre = $parametres["titre"];
    // $auteur = $parametres["auteur"];
    extract($parametres);

    include "vues/header.html.php";
    include "vues/$fichier";
    include "vues/footer.html.php";
}

function connexion(){
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
function selection(string $table): ?array
{
    $requete = connexion()->query("SELECT * FROM $table");
    if( $requete ){
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    return null;
}

/**
 * La fonction selectionId() va retourner un enregistrement
 * de la table passée en paramètre ayant pour identifiant la
 * valeur passée en 2ième paramètre
 */
function selectionId(string $table, int $id): ?array
{
    $requete = connexion()->query("SELECT * FROM $table
                                   WHERE id = $id");
    if( $requete ) {
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}


function connecte(){
    return $_SESSION["abonne"] ?? false;
}

/**
 * @return bool si un abonné est connecté et qu'il a 
 *               le niveau administrateur, la fonction retourne true
 */
function connecteAdmin(){
    $admin = connecte();
    if($admin){
        return $admin["niveau"] == NIVEAU_ADMIN;
    }
    return false;
}