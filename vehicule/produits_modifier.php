<?php

require "inc/init.inc.php";

$id = $_GET["id"] ?? null;

if ($id) {
    if (is_numeric($id)) {
        $requete = $connexion->query("SELECT * FROM produits WHERE id = $id");
        if ($requete && $requete->rowCount() == 1) {
            $produits = $requete->fetch(PDO::FETCH_ASSOC);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $titre = $_POST["titre"];
                $marque = $_POST["marque"];
                $erreurs = [];

                // Vérification de la validité du formulaire
                if (empty($titre)) {
                    $erreurs[] = "Le titre ne peut être vide";
                }
                if (strlen($titre) < 2) {
                    $erreurs[] = "Le titre doit avoir au moins 2 caractères";
                }
                if (strlen($titre) > 30) {
                    $erreurs[] = "Le titre ne peut avoir plus de 30 caractères";
                }

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

                $titre = addslashes($titre);
                $marque = addslashes($marque);

                if (empty($erreurs)) {
                    $texteRequete = "UPDATE produits ";
                    $texteRequete .= "SET titre = '$titre', marque = '$marque' ";
                    $texteRequete .= "WHERE id = $id";
                    $requete = $connexion->exec($texteRequete);
                    if ($requete == 1) {
                        $_SESSION["succes"] = "Le produits n°$id a bien été modifié";
                        redirection("produits_liste.php");
                    } else {
                        $_SESSION["erreur"] = "Erreur SQL";
                    }
                }
            }
        } else {
            $_SESSION["erreur"] = "Erreur SQL ou aucun produits ne correspond à cet identifiant";
            redirection("produits_liste.php");
        }
    } else {
        $_SESSION["erreur"] = "ERREUR 404 : la page demandée n'existe pas";
    }
}

// AFFICHAGE
// include "vues/header.html.php";
// include "vues/produits/form.html.php";
// include "vues/footer.html.php";

// affichage("produits/form.html.php", [ "titre" => $titre, "marque" => $marque ]);
$produits["h1"] = "Modifier le produits n°$id";
affichage("produits/form.html.php", $produits);
