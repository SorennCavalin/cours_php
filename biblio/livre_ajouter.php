<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
if ($_POST) {
    $titre = $_POST["titre"];
    $auteur = $_POST["auteur"];
    $erreurs = [];

    // Vérification de la validité du formulaire
    if (empty($titre)) {
        $erreurs[] = "Le titre ne peut être vide";
    }
    if (strlen($titre) < 2) {
        $erreurs[] = "Le titre doit avoir au moins 2 caractères";
    }
    // if( strlen($titre) > 30 ) {
    //     $erreurs[] = "Le titre ne peut avoir plus de 30 caractères";
    // }

    if (empty($auteur)) {
        $erreurs[] = "L'auteur ne peut être vide";
    }
    if (strlen($auteur) < 4) {
        $erreurs[] = "L'auteur doit avoir au moins 2 caractères";
    }
    if (strlen($auteur) > 30) {
        $erreurs[] = "L'auteur ne peut avoir plus de 30 caractères";
    }

    $titre = htmlentities($titre);
    $auteur = htmlentities($auteur);

    $titre = addslashes($titre);
    $auteur = addslashes($auteur);

    if (empty($erreurs)) {
        $requete = $connexion->exec("INSERT INTO livre (titre, auteur) VALUES ('$titre', '$auteur')");
        if ($requete == 1) {
            $_SESSION["succes"] = "Le nouveau livre a bien été enregistré";
            redirection("livre_liste.php");
        } else {
            $_SESSION["erreur"] = "Erreur SQL";
        }
    }
}

// AFFICHAGE
$h1 = "Ajouter un livre";
// include "vues/header.html.php";
// include "vues/livre/form.html.php";
// include "vues/footer.html.php";
affichage("livre/form.html.php", ["h1" => $h1]);
