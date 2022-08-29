<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= "livre n°$id" ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $titre ?? null ?></h6>
        <h6 class="card-subtitle mb-2 text-muted"><?= $auteur ?? null  ?></h6>
        <a href="livre_modifier.php?id=<?= "$id" ?>" class="card-link btn btn-primary">modifier</a>
        <a href="livre_liste.php" class="card-link btn btn-primary">retour</a>
        <a href="livre_supprimer.php?id=<?= "$id" ?>" class="card-link btn btn-danger">supprimer</a>
    </div>
</div>