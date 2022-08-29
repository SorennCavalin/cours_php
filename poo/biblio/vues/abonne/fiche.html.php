<ul class="list-group mb-3">
    <li class="list-group-item">
        <div class="d-flex">
            <div class="col-4"><strong>ID</strong></div>
            <div class="col-6"><?= $abonne->getid() ?></div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <div class="col-4"><strong>Pseudo</strong></div>
            <div class="col-6"><?= $abonne->getpseudo() ?></div>
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
            <div class="col-6"><?= $abonne->getprenom() . " " . $abonne->getnom() ?></div>
        </div>
    </li>

</ul>

<div class="d-flex justify-content-between">
    <a href="<?= lien('abonne') ?>" class="btn btn-primary">
        <i class="fa fa-reply"></i>
    </a>
    <a href="<?= lien("accueil") ?>" class="btn btn-primary">
        <i class="fa fa-home"></i>
    </a>


</div>