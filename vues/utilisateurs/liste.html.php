<table class="table table-borderer table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Mot de passe</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($liste as $utilisateur) : ?>
            <tr>
                <td>
                    <?= $utilisateur["id"] ?>
                </td>
                <td>
                    <?= $utilisateur["pseudo"] ?>
                </td>
                <td>
                    <?= $utilisateur["mdp"] ?>
                </td>
                <td>
                    <a href="utilisateurs_modifier.php?id=<?= $utilisateur["id"] ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="utilisateur_supprimer.php?id=<?= $utilisateur["id"] ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot class="thead-dark">
        <tr>
            <th colspan="2">nombre d'utilisateurs</th>
            <th><?= count($liste) ?></th>
        </tr>
    </tfoot>

</table>