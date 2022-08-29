<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach($livres as $livre): ?>
            <tr>
                <td>
                    <?= $livre->getId() ?>
                </td>

                <td>
                    <?= $livre->getTitre() ?>
                </td>

                <td>
                    <?= $livre->getAuteur() ?>
                </td>

                <td>
                    <a href="<?= lien("livre", "modifier", $livre->getId()) ?>" class="btn btn-secondary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= lien("livre", "supprimer", $livre->getId()) ?>" class="btn btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>