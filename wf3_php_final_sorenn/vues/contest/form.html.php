<?php
// $mode = isset($mode) ? $mode : "insertion";
$mode = $mode ?? "insertion";
include "vues/messages.html.php";

?>
<form method="post">
    <div class="form-group">
        <label for="game_id">quel Jeu ?</label>
        <select name="game_id" id="game_id" class="form-control" aria-label="Default select example">
            <option selected hidden>Choisissez un jeu</option>
            <?php foreach ($jeux as $jeu) :  ?>
                <option value="<?= $jeu["id"] ?>"><?= $jeu["title"] ?></option>
            <?php endforeach ?>

        </select>

    </div>
    <div class="form-group">
        <label for="start_date">Date de début</label>
        <input type="date" name="start_date" id="start_date" class="form-control">
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            Confirmer
        </button>
        <a href="<?= lien("contest", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>