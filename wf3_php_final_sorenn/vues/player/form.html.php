<?php
include "vues/messages.html.php";

?>
<form method="post">
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" id="email" class="form-control" aria-label="Default select example">
    </div>
    <div class="form-group">
        <label for="nickname">Pseudonyme</label>
        <input type="text" name="nickname" id="nickname" class="form-control">
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            Confirmer
        </button>
        <a href="<?= lien("player", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>