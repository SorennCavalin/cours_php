<div class="card-columns">
    <?php foreach ($produits as $produit) : ?>
        <div class="card">
            <img src="" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $produit["marque"] ?></h5>
                <p class="card-text"><?= $produit["carburant"] ?></p>
                <p class="card-text"><?= $produit["description"] ?></p>
                <p class="card-text"><?= $produit["prix"] ?> €</p>
                <p class="card-text">
                    <a href="fiche_produit.php?id=<?= $produit["id"] ?>"> Voir plus </a>
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>