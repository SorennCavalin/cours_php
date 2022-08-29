<?php

require "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}
$id = $_GET["id"] ?? null;
if ($id) {
    if (is_numeric($id)) {
        $requete = $connexion->query("SELECT * FROM abonne WHERE id = $id");
        if ($requete && $requete->rowCount() == 1) {
            $abonne = $requete->fetch(PDO::FETCH_ASSOC);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $requete = $connexion->exec("DELETE FROM abonne WHERE id = $id");
                if ($requete) {
                    $_SESSION["succes"] = "L'abonné n°$id a bien été supprimé";
                    redirection("abonne_liste.php");
                } else {
                    $_SESSION["erreur"] = "Erreur lors de la tentative de suppression";
                }
            }
        } else {
            $_SESSION["erreur"] = "Erreur SQL ou pas d'abonné avec cet identifiant";
            redirection("abonne_liste.php");
        }
    } else {
        $_SESSION["erreur"] = "ERREUR 404 : la page demandé n'existe pas";
    }
} else {
    $_SESSION["erreur"] = "ERREUR 404 : la page demandé n'existe pas";
}

affichage("abonne/form.html.php", [
    "h1" => "Suppresion de l'abonné n°$id ?",
    "abonne" => $abonne,
    "mode" => "suppression"
]);
