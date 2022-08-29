<div class="card-columns">
    <?php
    foreach ($matches as $matche) : ?>
        <div class="card">
            <img class="card-img-top" src="..." alt="">
            <div class="card-body">
                <h5 class="card-title"><?= $match->getTitle() ?></h5>
                <p class="card-text"><?= $livre->getAuteur() ?></p>
                <p class="card-text">
                    <a href="<?= lien("livre", "fiche", $livre->getId()) ?>">Voir plus</a>
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>