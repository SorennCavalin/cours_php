<?php
// $mode = isset($mode) ? $mode : "insertion";
$mode = $mode ?? "insertion";
?>

<?php include "vues/erreurs_formulaire.html.php"; ?>
<form method="post">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" value="<?= $titre ?? '' ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <div class="form-group">
        <label for="marque">marque</label>
        <input type="text" name="marque" id="marque" class="form-control" value="<?= $marque ?? '' ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" class="form-control" value="<?= $description ?? '' ?>" <?= $mode == "suppression" ? "disabled" : "" ?>></textarea>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="produits_liste.php" class="btn btn-danger">Annuler</a>
    </div>
</form>