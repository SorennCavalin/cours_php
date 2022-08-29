<div class="card-columns">
    <?php foreach($bijouxs as $bijoux): ?>
        <div class="card">
            <img class="card-img-top" src="..." alt="">
            <div class="card-body">
                <h5 class="card-title"><?= $bijoux->getTitre() ?></h5>
                <p class="card-text"><?= $bijoux->getDescription() ?></p>
                <p class="card-text"><?= $bijoux->getDate() ?></p>
                <p class="card-text">
                    <a href="<?= lien("bijoux", "fiche", $bijoux->getId()) ?>">Voir plus</a>
                </p>
            </div>
        </div>
    <?php endforeach ?>
</div>