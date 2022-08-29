<?php
include "inc/init.inc.php";


$id = $_GET["id"] ??  null;
if (empty($id)) {
    redirection("utilisateur_liste.php");
}

$requete = $connexion->query("SELECT * FROM utilisateur WHERE id = $id");
if ($requete !== false) {
    if ($requete->rowCount() == 1) {
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
        if (!empty($_POST)) {
            if ((!empty($_POST["pseudo"])) && (!empty($_POST["mdp"]))) {
                $pseudo = $_POST["pseudo"];
                $mdp = $_POST["mdp"];
                $resultat = $connexion->exec("UPDATE utilisateur SET pseudo = '$pseudo', mdp = '$mdp' WHERE id = $id");
                if ($resultat == 1) {
                    $messageSuccess = "Opération réussie!";
                } else {
                    $messageError = 'Veuillez changer au moins un champs';
                }
            } else {
                $messageError = "Veuillez modifier les champs";
            }
        }
    } else {
        $messageError = "il n'y a pas d'utilisateur avec cet identifiant";
    }
} else {
    $messageError = "Erreur SQL";
}



include "vues/header.html.php";
if (!isset($messageSuccess)) {
    include "vues/form_user.html.php";
} else {
    echo "<a href='utilisateur_liste.php' class='btn btn-primary'>cliquez ici pour revenir a la liste</a>";
}
include "vues/footer.html.php";
