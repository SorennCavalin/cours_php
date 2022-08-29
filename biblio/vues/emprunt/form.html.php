<?php
    if( !empty($emprunt) ){
        extract($emprunt);
    }
    include "vues/erreurs_formulaire.html.php"; ?>

<form method="post">
    <div class="form-group">
        <label for="date_sortie">Date sortie<sup class="text-warning">*</sup></label>
        <input type="date" name="date_sortie" id="date_sortie" class="form-control" 
                required value="<?= $date_sortie ?? "" ?>">
    </div>

    <div class="form-group">
        <label for="date_rendu">Date retour</label>
        <input type="date" name="date_rendu" id="date_rendu" class="form-control"
        value="<?= $date_rendu ?? "" ?>">
    </div>

    <div class="form-group">
        <label for="livre_id">Livre<sup class="text-warning">*</sup></label>
        <select name="livre_id" id="livre_id" class="form-control" required>
            <option value=""></option>
            <?php foreach($livres as $livre): ?>
                <option value="<?= $livre['id'] ?>" <?= !empty($livre_id) && $livre_id == $livre["id"] ? 'selected' : '' ?>>
                    <?= $livre["titre"] . " - " . $livre["auteur"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="abonne_id">Abonné<sup class="text-warning">*</sup></label>
        <select name="abonne_id" id="abonne_id" class="form-control">
            <option value=""></option>
            <?php foreach($abonnes as $abonne): ?>
                <option value="<?= $abonne["id"] ?>" <?= !empty($abonne_id) && $abonne_id == $abonne["id"] ? 'selected' : '' ?>>
                    <?= $abonne["pseudo"] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Enregistrer
        </button>
        <button type="reset" class="btn btn-warning">
            <i class="fa fa-eraser"></i> Effacer
        </button>
        <a href="emprunt_liste.php" class="btn btn-danger">
            <i class="fa fa-reply"></i> Annuler
        </a>
    </div>
</form>