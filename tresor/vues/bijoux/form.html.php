<?php
// $mode = isset($mode) ? $mode : "insertion";
$mode = $mode ?? "insertion";
?>

<?php include "vues/erreurs_formulaire.html.php"; ?>
<form method="post">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" value="<?= !empty($bijoux) ? $bijoux->getTitre() : "" ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" class="form-control" value="<?= !empty($bijoux) ? $bijoux->getDescription() : "" ?>" <?= $mode == "suppression" ? "disabled" : "" ?>><?= !empty($bijoux) ? $bijoux->getDescription() : "" ?></textarea>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="text" name="date" id="date" class="form-control" value="<?= !empty($bijoux) ? $bijoux->getDate() : "" ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="<?= lien("bijoux", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>