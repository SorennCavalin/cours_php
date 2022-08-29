<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Nom du jeu</th>
        <th>Minimum de joueurs</th>
        <th>Maximum de joueurs</th>
    </thead>
    <tbody>
        <?php foreach ($games as $game) : ?>
            <tr>
                <td>
                    <?= $game->getId() ?>
                </td>

                <td>
                    <?= $game->getTitle() ?>
                </td>

                <td>
                    <?= $game->getMin_players() ?>
                </td>

                <td>
                    <?= $game->getMax_players() ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>