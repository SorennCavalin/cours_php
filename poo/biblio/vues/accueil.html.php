<div class="card-columns">
    <?php foreach($livres as $livre): ?>
        <div class="card">
            <img class="card-img-top" src="..." alt="">
            <div class="card-body">
                <h5 class="card-title"><?= $livre->getTitre() ?></h5>
                <p class="card-text"><?= $livre->getAuteur() ?></p>
                <p class="card-text">
                    <a href="<?= lien("livre", "fiche", $livre->getId()) ?>">Voir plus</a>
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>