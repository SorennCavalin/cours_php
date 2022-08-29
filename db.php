<?php
include "vues/header.html.php";
$connexion = new PDO("mysql:host=localhost;dbname=bddtest", "root", "");
if ($_POST) {
    if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"])) {
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        $resultat = $connexion->exec("INSERT INTO utilisateur (pseudo,mdp) VALUES ('$pseudo','$mdp')");
        if ($resultat == 1) {
            $messageSuccess = "Vous etes enregistré(e) dans la base de données";
        } else {
            $messageError = "Erreur lors de l'insertion en bdd";
        }
    } else {
        $messageError = "veuillez remplir tout les champs obligatoires";
        $pseudo = $_POST["pseudo"] ?? "";
    }
}

$request = $connexion->query("SELECT * FROM utilisateur");
$utilisateurs = $request->fetchALL(PDO::FETCH_ASSOC);

debug($utilisateurs);
foreach ($utilisateurs as $utilisateur) {
    foreach ($utilisateur as $champ => $valeur) {
        ecrire("<strong>$champ</strong> : $valeur");
    }
    echo "<hr>";
}


?>
<?php if (!empty($messageError)) : ?>
    <div class="alert alert-danger"><?= $messageError ?></div>
<?php endif; ?>
<?php if (!empty($messageSuccess)) : ?>
    <div class="alert alert-succes"><?= $messageSuccess ?></div>
<?php endif; ?>
<?php
include "vues/form_user.html.php";
include "vues/footer.html.php";
