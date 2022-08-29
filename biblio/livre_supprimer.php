<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
$id = $_GET["id"] ?? null;

if( $id ) {
    if( is_numeric($id) ){
        $requete = $connexion->query("SELECT * FROM livre WHERE id = $id");
        if( $requete && $requete->rowCount() == 1) {
            $livre = $requete->fetch(PDO::FETCH_ASSOC);
            if( $_SERVER["REQUEST_METHOD"] == "POST" ){
                $requete = $connexion->exec("DELETE FROM livre WHERE id = $id");
                if($requete) {
                    $_SESSION["succes"] = "Le livre n°$id a bien été supprimé";
                    redirection("livre_liste.php");
                } else {
                    $_SESSION["erreur"] = "Erreur lors de la tentative de suppression";
                    redirection("livre_liste.php");
                }
            }
        } else {
            $_SESSION["erreur"] = "Erreur SQL ou aucun livre ne correspond à cet identifiant";
            redirection("livre_liste.php");
        }
    } else {
        $_SESSION["erreur"] = "ERREUR 404 : la page demandée n'existe pas";
    }
}

// AFFICHAGE
$livre["h1"] = "Supprimer le livre n°$id ?";
$livre["mode"] = "suppression";
affichage("livre/form.html.php", $livre);