<ul class="list-group">
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Titre</strong>
            <span class="col-10"><?= $animal->getTitre() ?></span>
        </div>
    </li>

    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Description</strong>
            <span class="col-10"><?= $animal->getDescription() ?></span>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Date</strong>
            <span class="col-10"><?= $animal->getDate() ?></span>
        </div>
    </li>
</ul>

<div class="d-flex justify-content-between mt-5">
    <a href="<?= lien("accueil") ?>" class=" btn btn-secondary">
        <i class="fa fa-home"></i> Retour à l'accueil
    </a>
</div>