<?php
include "vues/messages.html.php";

?>
<form method="post">
    <div class="form-group">
        <label for="title">Nom du jeu</label>
        <input name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="min_players">nombre minimum de joueurs</label>
        <input type="number" name="min_players" id="min_players" class="form-control">
    </div>
    <div class="form-group">
        <label for="max_players">nombre maximum de joueurs</label>
        <input type="number" name="max_players" id="max_players" class="form-control">
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            Confirmer
        </button>
        <a href="<?= lien("player", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>