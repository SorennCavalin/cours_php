<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
$id = $_GET["id"] ?? null;

if ($id) {
    if (is_numeric($id)) {
        $requete = $connexion->query("SELECT * FROM livre WHERE id = $id");
        if ($requete && $requete->rowCount() == 1) {
            $livre = $requete->fetch(PDO::FETCH_ASSOC);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                if (strlen($titre) > 30) {
                    $erreurs[] = "Le titre ne peut avoir plus de 30 caractères";
                }

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
                    $texteRequete = "UPDATE livre ";
                    $texteRequete .= "SET titre = '$titre', auteur = '$auteur' ";
                    $texteRequete .= "WHERE id = $id";
                    $requete = $connexion->exec($texteRequete);
                    if ($requete == 1) {
                        $_SESSION["succes"] = "Le livre n°$id a bien été modifié";
                        redirection("livre_liste.php");
                    } else {
                        $_SESSION["erreur"] = "Erreur SQL";
                    }
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
// include "vues/header.html.php";
// include "vues/livre/form.html.php";
// include "vues/footer.html.php";

// affichage("livre/form.html.php", [ "titre" => $titre, "auteur" => $auteur ]);
$livre["h1"] = "Modifier le livre n°$id";
affichage("livre/form.html.php", $livre);
