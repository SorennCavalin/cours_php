<?php
/*
OPERATEUR TERNAIRE :
    condition ? valeur_si_vrai : valeur_si_faux

    L'operateur ternaire permet d'avoir une expression dont la valeur dépend d'une condition.
    Si la condition est vraie, la valeur se trouve apres le ?
    Si la condition est fausse, la valeur se trouve apres les :
*/
include "vues/header.html.php";
if (!empty($_POST)) {
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["mdp"];
    if (!empty($pseudo) && !empty($mdp)) {
        if ($pseudo == "admin" && $mdp == "admin") {
            $messageSuccess = "Vous etes connecté";
        } else {
            $messageError = "Le pseudo ou le mot de passe sont incorrects";
        }
    } else {
        $messageError = "Veuillez remplir les cases pseudo et mot de passe.";
    }
}
?>
<?php if (isset($messageSuccess)) : ?>
    <div class="alert alert-success"><?php echo $messageSuccess ?></div>
<?php endif; ?>
<div class="alert alert-danger"><?= isset($messageError) ? $messageError : "" ?></div>

<form action="" method="post">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control">
    </div>
    <div class="form-group">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp" class="form-control">
    </div>
    <div class="d-flex">
        <button type="submit" class="btn btn-primary mr-2">Se connecter</button>
        <button type="reset" class="btn btn-danger">Annuler</button>
    </div>
</form>

<?php
include "vues/footer.html.php";
