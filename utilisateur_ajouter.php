<?php

include "inc/init.inc.php";

if ($_POST) {
    if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"])) {
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        $resultat = $connexion->exec("INSERT INTO utilisateur (pseudo,mdp) VALUES ('$pseudo','$mdp')");
        if ($resultat == 1) {
            $_SESSION["success"] = "Vous etes enregistré(e) dans la base de données";
            redirection("utilisateur_liste.php");
        } else {
            $_SESSION["error"] = "Erreur lors de l'insertion en bdd";
        }
    } else {
        $_SESSION["error"] = "veuillez remplir tout les champs";
    }
}



include "vues/header.html.php";
include "vues/utilisateurs/nouveau.html.php";
include "vues/footer.html.php";
