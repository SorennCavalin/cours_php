<?php 
    $mode = $mode ?? "insertion";
    if( !empty($abonne) && is_array($abonne) ){
        extract($abonne);
    }

?>

<?php include "vues/erreurs_formulaire.html.php"; ?>

<form method="post">
<div class="form-group">
        <label for="pseudo">Pseudo <sup>*</sup></label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?= $pseudo ?? '' ?>"
                <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    
    <div class="form-group">
        <label for="mdp">Mot de passe <sup>*</sup></label>
        <input type="text" name="mdp" id="mdp" class="form-control"
                <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    

    <div class="form-group">
        <label for="nom">nom</label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?= $nom ?? '' ?>"
                <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $prenom ?? '' ?>"
                <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="form-group">
        <label for="niveau">Niveau</label>
        <input type="text" name="niveau" id="niveau" class="form-control" value="<?= $niveau ?? '' ?>"
                <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="abonne_liste.php" class="btn btn-danger">Annuler</a>
    </div>
</form>