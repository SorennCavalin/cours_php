<ul class="list-group">
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Pseudo</strong>
            <span class="col-10"><?= $livre["titre"] ?></span>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Auteur</strong>
            <span class="col-10"><?= $livre["auteur"] ?></span>
        </div>
    </li>
</ul>

<div class="d-flex justify-content-between mt-5">
    <a href="/" class="btn btn-primary">
        <i class="fa fa-home"></i> Retour à l'accueil
    </a>
    <a href="espace_emprunter.php" class="btn btn-primary">
        <i class="fa fa-shopping-cart"></i>
        Emprunter
    </a>
</div>