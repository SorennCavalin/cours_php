<?php

require "inc/init.inc.php";
require "classes/bdd.php";
require "entity/produits.php";



if ($_POST) {
    $produits = new Produits();
    $dataBase = new Bdd;
    extract($_POST);
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

    if (empty($marque)) {
        $erreurs[] = "L'marque ne peut être vide";
    }
    if (strlen($marque) < 4) {
        $erreurs[] = "L'marque doit avoir au moins 2 caractères";
    }
    if (strlen($marque) > 30) {
        $erreurs[] = "L'marque ne peut avoir plus de 30 caractères";
    }

    $titre = htmlentities($titre);
    $marque = htmlentities($marque);
    $description = htmlentities($description);

    $titre = addslashes($titre);
    $marque = addslashes($marque);
    $description = addslashes($description);

    if (empty($erreurs)) {
        $produits->setMarque($marque);
        $produits->setTitre($titre);
        $produits->setDescription($description);
        $marque = $produits->getMarque();
        $titre = $produits->getTitre();
        $description = $produits->getDescription();


        $requete = $dataBase->insertRow('produits', 'marque, titre, description', ":marque, :titre, :description");
        $requete->bindValue(':marque', $marque);
        $requete->bindValue(':titre', $titre);
        $requete->bindValue(':description', $description);
        // requete Execution
        $requete->execute();

        // $requete = $connexion->exec("INSERT INTO produits (titre, marque, description) VALUES ('$titre', '$marque', '$description')");
        if ($requete->execute()) {
            $_SESSION["succes"] = "Le nouveau produits a bien été enregistré";
            redirection("produits_liste.php");
        } else {
            $_SESSION["erreur"] = "Erreur SQL";
        }
    }
}

// AFFICHAGE
$h1 = "Ajouter un produits";
// include "vues/header.html.php";
// include "vues/produits/form.html.php";
// include "vues/footer.html.php";
affichage("produits/form.html.php", ["h1" => $h1]);
