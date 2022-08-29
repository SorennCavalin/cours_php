<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Date</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($animals as $animal) : ?>
            <tr>
                <td>
                    <?= $animal->getId() ?>
                </td>

                <td>
                    <?= $animal->getTitre() ?>
                </td>

                <td>
                    <?= $animal->getDescription() ?>
                </td>
                <td>
                    <?= $animal->getDate() ?>
                </td>

                <td>
                    <a href="<?= lien("animal", "modifier", $animal->getId()) ?>" class="btn btn-secondary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= lien("animal", "supprimer", $animal->getId()) ?>" class="btn btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>