<h2>Êtes-vous sûr(e) de vouloir supprimer l'utilisateur suivant ? </h2>

<ul>
    <li>
        <strong>ID</strong> : <?= $utilisateur["id"] ?>
    </li>
    <li>
        <strong>Pseudo</strong> : <?= $utilisateur["pseudo"] ?>
    </li>
    <li>
        <strong>Mot de passe</strong> : <?= $utilisateur["mdp"] ?>
    </li>
</ul>

<form action="" method="post">
    <button type="submit" class="btn btn-success">Confirmer</button>
    <a href="utilisateur_liste.php" class="btn btn-danger">annuler</a>
</form>