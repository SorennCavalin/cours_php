<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= "produits n°$id" ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $titre ?? null ?></h6>
        <h6 class="card-subtitle mb-2 text-muted"><?= $marque ?? null  ?></h6>
        <a href="produits_modifier.php?id=<?= "$id" ?>" class="card-link btn btn-primary">modifier</a>
        <a href="produits_liste.php" class="card-link btn btn-primary">retour</a>
        <a href="produits_supprimer.php?id=<?= "$id" ?>" class="card-link btn btn-danger">supprimer</a>
    </div>
</div>