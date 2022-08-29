<?php
    $page = $_GET["page"] ?? 1;
    $prev = $page - 1;
    $next = $page + 1;
    // $next = $next <= $pageMax ? $next : $pageMax;
?>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Abonné</th>
            <th>Livre</th>
            <th>Sortie</th>
            <th>Retour</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($emprunts as $emprunt): ?>
            <tr>
                <td><?= $emprunt["id"] ?></td>
                <td><?= $emprunt["pseudo"] ?></td>
                <td><?= $emprunt["livre"] ?></td>
                <td><?= date("d/m/Y", strtotime($emprunt["date_sortie"])) ?></td>
                <td><?= !empty($emprunt["date_rendu"]) ? date("d/m/Y", strtotime($emprunt["date_rendu"])) : "à rendre" ?></td>
                <td>
                    <a href="emprunt_fiche.php?id=<?= $emprunt["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="emprunt_modifier.php?id=<?= $emprunt["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="emprunt_supprimer.php?id=<?= $emprunt["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="d-flex justify-content-around">
    <a href="?page=<?= $prev ?>" class="btn btn-secondary <?= $prev < 1 ? 'disabled' : '' ?>">
        <i class="fa fa-backward"></i>
    </a>
    <a href="?page=<?= $next ?>" class="btn btn-secondary <?= $next > $pageMax ? 'disabled' : '' ?>">
        <i class="fa fa-forward"></i>
    </a>
</div>