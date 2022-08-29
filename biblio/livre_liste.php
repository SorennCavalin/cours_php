<?php
include "inc/init.inc.php";
if (!connecteAdmin()) {
    redirection("/erreur/403.php");
}

$requete = $connexion->query("SELECT * FROM livre");
$livres = $requete->fetchAll(PDO::FETCH_ASSOC);

// AFFICHAGE
$h1 = "Liste des livres";
include "vues/header.html.php";
?>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($livres as $livre) : ?>
            <tr>
                <td>
                    <?= $livre["id"] ?>
                </td>

                <td>
                    <?= $livre["titre"] ?>
                </td>

                <td>
                    <?= $livre["auteur"] ?>
                </td>

                <td>
                    <a href="/livre_modifier.php?id=<?= $livre["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="/livre_supprimer.php?id=<?= $livre["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include "vues/footer.html.php";
