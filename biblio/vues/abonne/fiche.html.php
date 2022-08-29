<ul class="list-group mb-3">
    <li class="list-group-item">
        <div class="d-flex">
            <div class="col-4"><strong>ID</strong></div>
            <div class="col-6"><?= $abonne["id"] ?></div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <div class="col-4"><strong>Pseudo</strong></div>
            <div class="col-6"><?= $abonne["pseudo"] ?></div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <div class="col-4"><strong>Mot de passe</strong></div>
            <div class="col-6">****</div>
        </div>
    </li>

    <li class="list-group-item">
        <div class="d-flex">
            <div class="col-4"><strong>Identité</strong></div>
            <div class="col-6"><?= $abonne["prenom"] . " " . $abonne["nom"] ?></div>
        </div>
    </li>

</ul>

<div class="d-flex justify-content-between">
    <a href="abonne_liste.php" class="btn btn-primary">
        <i class="fa fa-reply"></i>
    </a>
    <a href="/" class="btn btn-primary">
        <i class="fa fa-home"></i>
    </a>


</div>