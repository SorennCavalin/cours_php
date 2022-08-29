<div class="card-columns">
    <?php foreach ($livres as $livre) : ?>
        <div class="card">
            <img src="" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $livre["titre"] ?></h5>
                <p class="card-text"><?= $livre["auteur"] ?></p>
                <p class="card-text">
                    <a href="fiche_livre.php?id=<?= $livre["id"] ?>"> Voir plus </a>
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>