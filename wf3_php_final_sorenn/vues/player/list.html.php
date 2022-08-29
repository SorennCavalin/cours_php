<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Email du joueur</th>
        <th>Pseudo du joueur</th>
    </thead>
    <tbody>
        <?php foreach ($players as $player) : ?>
            <tr>
                <td>
                    <?= $player->getId() ?>
                </td>

                <td>
                    <?= $player->getEmail() ?>
                </td>

                <td>
                    <?= $player->getNickname() ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>