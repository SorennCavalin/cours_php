<div class="card-columns">
    <?php foreach ($animals as $animal) : ?>
        <div class="card">
            <img class="card-img-top" src="..." alt="">
            <div class="card-body">
                <h5 class="card-title"><?= $animal->getTitre() ?></h5>
                <p class="card-text"><?= $animal->getDescription() ?></p>
                <p class="card-text"><?= $animal->getDate() ?></p>
                <p class="card-text">
                    <a href="<?= lien("animal", "fiche", $animal->getId()) ?>">Voir plus</a>
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>