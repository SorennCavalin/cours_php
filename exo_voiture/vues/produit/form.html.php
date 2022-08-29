<?php
// $mode = isset($mode) ? $mode : "insertion";
$mode = $mode ?? "insertion";
$infos = "<span class='font-weight-light'>(Max 130 caractère)</span>";
extract($produit)

?>

<?php include "vues/erreurs_formulaire.html.php" ?>
<form method="post">
    <div class="form-group">
        <label for="marque">Marque <sup class="text-red">*</sup></label>
        <input type="text" name="marque" id="marque" class="form-control" value="<?= $marque ?? '' ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <div class="form-group">
        <label for="carburant">Type de carburant <sup class="text-red">*</sup></label>
        <select name="carburant" id="carburant" class="custom-select" aria-label="Default select example" <?= $mode == "suppression" ? "disabled" : "" ?>>
            <option value="diesel" <?= isset($carburant) && $carburant == "diesel" ? "selected" : "" ?>>diesel</option>
            <option value="essence" <?= isset($carburant) && $carburant == "essence" ? "selected" : "" ?>>essence</option>
        </select>
    </div>
    <div class="form-group">
        <label for="etat">Etat de la voiture<sup class="text-red">*</sup></label>
        <select name="etat" id="etat" class="custom-select" aria-label="Default select example" <?= $mode == "suppression" ? "disabled" : "" ?>>
            <option value="neuve" <?= isset($etat) && $etat == "neuve" ? "selected" : "" ?>>Neuve</option>
            <option value="occasion" <?= isset($etat) && $etat == "occasion" ? "selected" : "" ?>>Occasion</option>
            <option value="reconditionnée" <?= isset($etat) && $etat == "reconditionnée" ? "selected" : "" ?>>Reconditionnée</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description de la voiture <?= ($mode == "insertion") ? $infos : "" ?></label>
        <textarea type="text" name="description" id="description" class="form-control" <?= $mode == "suppression" ? "disabled" : "" ?>><?= $description ?? '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="prix">prix <sup class="text-red">*</sup></label>
        <input type="text" name="prix" id="prix" class="form-control" value="<?= $prix ?? '' ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
    </div>
    <?php if ($mode == "modification") : ?>
        <div class="form-group">
            <label for="date_achat">date d'achat</label>
            <input type="date" name="date_achat" id="date_achat" class="form-control" value="<?= $date_achat ?? '' ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>
        </div>
    <?php endif ?>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            <?= $mode == "suppression" ? "Confirmer" : "Enregistrer" ?>
        </button>
        <a href="produits_liste.php" class="btn btn-danger">Annuler</a>
    </div>
</form>