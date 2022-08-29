<?php

?>
<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>Id</th>
        <th>Marque</th>
        <th>Type de carburant</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Date d'achat</th>
        <th>Etat</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($produits as $produit) : ?>
            <tr>
                <td><?= $produit["id"] ?></td>
                <td><?= $produit["marque"] ?></td>
                <td><?= $produit["carburant"] ?></td>
                <td><?= $produit["description"] ?></td>
                <td><?= $produit["prix"] ?></td>
                <td><?= !empty($produit["date_achat"]) ? $produit["date_achat"] : "En vente" ?></td>
                <td><?= $produit["etat"] ?></td>
                <td>
                    <a href="produit_modifier.php?id=<?= $produit["id"] ?>"><i class="fa fa-edit m-1"></i></a><a href="produit_supprimer.php?id=<?= $produit["id"] ?>"><i class="fa fa-trash m-1"></i></a><a href="produit_afficher.php?id=<?= $produit["id"] ?>"><i class="fa fa-eye m-1"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div class="d-flex justify-content-around">

    <a href="page=1" class="btn <?= ($page < 2) ? "disabled" : "" ?>">
        <i class="fas fa-angle-double-left"></i>
    </a>
    <a href="?page=<?= $page - 1 ?>" class="btn <?= ($page < 2) ? "disabled" : "" ?>">
        <i class="fas fa-angle-left"></i>
    </a>
    <a href="?page=<?= $page + 1 ?>" class="btn <?= ($page >= $pageMax) ? "disabled" : "" ?>">
        <i class="fas fa-angle-right"></i>
    </a>
    <a href="?page=<?= $pageMax ?>" class="btn <?= ($page >= $pageMax) ? "disabled" : "" ?>">
        <i class="	fas fa-angle-double-right"></i>
    </a>
</div>