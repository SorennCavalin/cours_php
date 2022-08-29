<form action="" method="post">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?= $utilisateur["pseudo"] ?? "" ?>">
    </div>
    <div class="form-group">
        <label for="mdp">Mot de passe</label>
        <input type="text" name="mdp" id="mdp" class="form-control" value="<?= $utilisateur["mdp"] ?? "" ?>">
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary mr-2">S'enregistrer</button>
        <button type="reset" class="btn btn-danger">Effacer</button>
        <a href="utilisateur_liste.php" class="btn btn-secondary">annuler</a>
    </div>
</form>