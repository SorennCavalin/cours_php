<?php
include "inc/init.inc.php";


$requete = $connexion->query("SELECT * FROM produits");
$produitss = $requete->fetchAll(PDO::FETCH_ASSOC);

// AFFICHAGE
$h1 = "Liste des produitss";
include "vues/header.html.php";
?>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Titre</th>
        <th>marque</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($produitss as $produits) : ?>
            <tr>
                <td>
                    <?= $produits["id"] ?>
                </td>

                <td>
                    <?= $produits["titre"] ?>
                </td>

                <td>
                    <?= $produits["marque"] ?>
                </td>

                <td>
                    <a href="/produits_modifier.php?id=<?= $produits["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="/produits_supprimer.php?id=<?= $produits["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include "vues/footer.html.php";
