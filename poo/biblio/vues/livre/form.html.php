<?php 
    // $mode = isset($mode) ? $mode : "insertion";
    $mode = $mode ?? "insertion";
?>

<?php include "vues/erreurs_formulaire.html.php"; ?>
<form method="post">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" value="<?= !empty($livre) ? $livre->getTitre() : "" ?>"
                <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <div class="form-group">
        <label for="auteur">Auteur</label>
        <input type="text" name="auteur" id="auteur" class="form-control" value="<?= !empty($livre) ? $livre->getAuteur() : "" ?>"
                <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="<?= lien("livre", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>