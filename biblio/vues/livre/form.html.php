<?php 
    // $mode = isset($mode) ? $mode : "insertion";
    $mode = $mode ?? "insertion";
?>

<?php include "vues/erreurs_formulaire.html.php"; ?>
<form method="post">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" value="<?= $titre ?? '' ?>"
                <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <div class="form-group">
        <label for="auteur">Auteur</label>
        <input type="text" name="auteur" id="auteur" class="form-control" value="<?= $auteur ?? '' ?>"
                <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="livre_liste.php" class="btn btn-danger">Annuler</a>
    </div>
</form>