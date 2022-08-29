<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Date</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach($bijouxs as $bijoux): ?>
            <tr>
                <td>
                    <?= $bijoux->getId() ?>
                </td>

                <td>
                    <?= $bijoux->getTitre() ?>
                </td>

                <td>
                    <?= $bijoux->getDescription() ?>
                </td>
                <td>
                    <?= $bijoux->getDate() ?>
                </td>

                <td>
                    <a href="<?= lien("bijoux", "modifier", $bijoux->getId()) ?>" class="btn btn-secondary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= lien("bijoux", "supprimer", $bijoux->getId()) ?>" class="btn btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>