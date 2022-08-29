<?php

require "inc/init.inc.php";

if (!connecteAdmin()) {
    redirection("erreur/403.php");
}
if (!empty($_POST)) {
    extract($_POST);
    $erreurs = [];
    if (!empty($marque)) {
        $marque = trim($marque);
        $marque = addslashes($marque);
        $marque = htmlentities($marque);
        if (strlen($marque) > 20) {
            $erreurs[] = "Le nom de la marque est trop long, il doit faire un maximum de 20 caractères";
        }
        if (!ctype_alnum($marque)) {
            $erreurs[] = "La marque ne peut pas contenir de caractères spéciaux(/,*,%,@,-,|,#,etc...)";
        }
    } else {
        $erreurs[] = "Une marque est nécessaire pour enregistrer une voiture";
    }
    if (!empty($description)) {
        if (strlen($description) > 130) {
            $erreurs[] = "La description est trop longue, elle doit faire un maximum de 130 caractères";
        }
        $description = trim($description);
        $description = addslashes($description);
        $description = htmlentities($description);
        if (strlen($description) > 200) {
            $erreurs[] = "Une grande quantité de caractères spéciaux à été détectée. Veuillez en réduire le nombre";
        }
    }
    if (empty($carburant)) {
        $erreurs[] = "Un type carburant est nécessaire pour l'enregistrement en base de donnée";
    }
    if (empty($etat)) {
        $erreurs[] = "Un état est nécessaire pour l'enregistrement en base de donnée";
    }
    if (!empty($prix)) {
        if (!is_numeric($prix)) {
            $erreurs[] = "Le prix ne peut pas contenir de lettre ou de caractères spéciaux";
        }
    } else {
        $erreurs[] = "Un prix est nécessaire pour l'enregistrement en bae de donnée";
    }
    if (empty($erreurs)) {
        $texteRequete = "INSERT INTO produit (marque,carburant,";
        if (!empty($description)) {
            $texteRequete .= "description,";
        }
        $texteRequete .= "etat,prix)
        VALUES ('$marque','$carburant',";
        if (!empty($description)) {
            $texteRequete .= "'$description',";
        }
        $texteRequete .= "'$etat',$prix)";
        $requete = connexion()->exec($texteRequete);
        // "INSERT INTO produit (marque,carburant,description,etat,prix)
        // --   VALUES ('$marque','$carburant','$description','$etat',$prix) "
        if ($requete) {
            if ($requete == 1) {
                $_SESSION['succes'] = "La voiture a bien été enregistrée";
            } else {
                $_SESSION["erreur"] = "Erreur lors de l'enregistrement de la voiture";
            }
        } else {
            $_SESSION["erreur"] = "Erreur SQL";
        }
    }
}



affichage("/produit/form.html.php", [
    "h1" => "Ajouter une nouvelle voiture",
    "produit" => $_POST,
    "erreurs" => $erreurs ?? null,
]);
