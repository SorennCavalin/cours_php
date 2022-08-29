<div class="card-columns">
    <?php foreach ($produits as $produits) : ?>
        <div class="card">
            <img src="" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $produits["titre"] ?></h5>
                <p class="card-text"><?= $produits["marque"] ?></p>
                <p class="card-text">
                    <a href="fiche_produits.php?id=<?= $produits["id"] ?>"> Voir plus </a>
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>