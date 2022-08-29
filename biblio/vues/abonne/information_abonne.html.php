<?php


?>


<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= "abonne n°$id" ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $pseudo ?? null ?></h6>
        <h6 class="card-subtitle mb-2 text-muted"><?= $mdp ?? null  ?></h6>
        <h6 class="card-subtitle mb-2 text-muted"><?= $prenom ?? null . " " . $nom ?? null  ?></h6>
        <a href="abonne_modifier.php?id=<?= "$id" ?>" class="card-link btn btn-primary">modifier</a>
        <a href="abonne_liste.php" class="card-link btn btn-primary">retour</a>
        <a href="abonne_supprimer.php?id=<?= "$id" ?>" class="card-link btn btn-danger">supprimer</a>
    </div>
</div>