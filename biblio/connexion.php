<?php

require "inc/init.inc.php";
if( !empty($_SESSION["abonne"]) ){
    $_SESSION["erreur"] = $_SESSION["abonne"]["pseudo"] . " , vous êtes déjà connecté";
    redirection("/");
}

if( $_POST ){
    extract($_POST);
    if( !empty($pseudo) && !empty($mdp) ){
        $requete = connexion()->prepare("SELECT * FROM abonne WHERE pseudo = :pseudo");
        $requete->bindValue(":pseudo", $pseudo);
        if( $requete->execute() && $requete->rowCount() == 1 ){
            $abonne = $requete->fetch(PDO::FETCH_ASSOC);
            if( password_verify($mdp, $abonne["mdp"]) ){
                $_SESSION["succes"] = "Bonjour $pseudo, vous êtes connecté";
                $_SESSION["abonne"] = $abonne;
                redirection("/");
            } else {
                $_SESSION["erreur"] = "Le mot de passe ne correspond pas";
            }

        } else {
            $_SESSION["erreur"] = "Il n'y a pas d'abonné avec ce pseudo";
        }
    } else {
        $_SESSION["erreur"] = "Le pseudo et le mot de passe sont obligatoires";
    }
}

affichage("form_connexion.html.php", [
    "h1" => "Entrez vos identifiants de connexion"
]);