<ul class="list-group">
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Marque</strong>
            <span class="col-10"><?= $produit["marque"] ?></span>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Description</strong>
            <span class="col-10"><?= $produit["description"] ?></span>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Type de carburant</strong>
            <span class="col-10"><?= $produit["carburant"] ?></span>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Prix</strong>
            <span class="col-10"><?= $produit["prix"] ?></span>
        </div>
    </li>
</ul>

<div class="d-flex justify-content-between mt-5">
    <a href="/" class="btn btn-primary">
        <i class="fa fa-home"></i> Retour à l'accueil
    </a>
    <a href="espace_emprunter.php" class="btn btn-primary">
        <i class="fa fa-shopping-cart"></i>
        Acheter
    </a>
</div>