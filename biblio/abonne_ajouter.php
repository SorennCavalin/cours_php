<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
if ($_POST) {
    extract($_POST);

    $erreurs = [];

    // Vérification de la validité du formulaire
    if (empty($pseudo)) {
        $erreurs[] = "Le pseudo ne peut pas être vide";
    }
    if (strlen($pseudo) < 4) {
        $erreurs[] = "Le pseudo doit avoir au moins 4 caractères";
    }
    if (strlen($pseudo) > 20) {
        $erreurs[] = "Le pseudo ne peut avoir plus de 20 caractères";
    }

    if (!strpos($pseudo, " ") === false) {
        $erreurs[] = "Les espaces ne sont pas autorisés pour le pseudo";
    }

    // Est-ce que le pseudo existe déjà dans la bdd ?
    $requete = $connexion->query("SELECT * FROM abonne WHERE pseudo = '$pseudo'");
    if ($requete && $requete->rowCount()) {
        $erreurs[] = "Le pseudo existe déjà, veuillez en choisir un nouveau";
    }

    if (!empty($nom)) {
        if (strlen($nom) < 2) {
            $erreurs[] = "Le nom doit avoir au moins 2 caractères";
        }
        if (strlen($nom) > 30) {
            $erreurs[] = "Le nom ne peut avoir plus de 30 caractères";
        }
    }
    if (!empty($prenom)) {
        if (strlen($prenom) < 2) {
            $erreurs[] = "Le prénom doit avoir au moins 2 caractères";
        }
        if (strlen($prenom) > 30) {
            $erreurs[] = "Le prénom ne peut avoir plus de 30 caractères";
        }
    }
    if (empty($mdp)) {
        $erreurs[] = "Le mot de passe ne peut pas être vide";
    }

    /*
    $mdp = trim($mdp); // la fonction trim supprime les espaces au début et à la fin d'une chaîne de caractères
    if( strlen($mdp) < 5 || strlen($mdp) > 10 ){
        $erreurs[] = "Le mot passe doit contenir entre 5 et 10 caratères";
    } else {
        $caracteres = str_split($mdp, 1);
        $minusucle = false;
        $majuscule = false;
        $chiffre = false;
        $special = false;
        foreach($caracteres as $car){
            if( $car >= 'a' && $car <= 'z' ){
                $minusucle = true;
            }

            if( $car >= 'A' && $car <= 'Z' ){
                $majuscule = true;
            }

            if( $car >= '0' && $car <= '9' ){
                $chiffre = true;
            }
            if( in_array($car, ['@', '+', '*', '=', '/' ]) ){
                $special = true;
            }
        }
        if( !$minusucle || !$majuscule || !$chiffre || !$special ){
            $erreurs[] = "Le mot de passe doit contenir au mois 1 minuscule, 1 majuscule, 1 chiffre, 1 caractère spécial parmi @+/*=";
        }
    }
    */

    if (empty($erreurs)) {
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);
        $texteRequete = "INSERT INTO abonne (pseudo, mdp, nom, prenom) VALUES (";
        $texteRequete .= "'$pseudo', '$mdp', ";
        $texteRequete .= "'" . ($nom ?? null) . "', ";
        $texteRequete .= "'" . ($prenom ?? null) . "')";

        $requete = $connexion->exec($texteRequete);
        if ($requete !== false) {
            if ($requete == 1) {
                $_SESSION["succes"] = "Le nouvel abonné a bien été enregistré";
                redirection("abonne_liste.php");
            } else {
                $_SESSION["erreur"] = "Erreur : l'abonné n'a pas été enregisté";
            }
        } else {
            $_SESSION["erreur"] = "Erreur SQL";
        }
    } else {
        $abonne = $_POST;
        $abonne["mdp"] = "";
    }
}

affichage("abonne/form.html.php", [
    "h1" => "Ajouter un nouvel abonné",
    "abonne" => $abonne ?? null,
    "erreurs" => $erreurs ?? null
]);
