<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>ID</th>
        <th>Niveau</th>
        <th>Pseudo</th>
        <th>Mot de passe</th>
        <th>Identité</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach($abonnes as $abonne): ?>
            <tr>
                <td>
                    <?= $abonne["id"] ?>
                </td>

                <td>
                    <?php 
                        switch($abonne["niveau"]): 
                            case NIVEAU_ADMIN:
                                echo "Administrateur";
                                break;
                            case NIVEAU_ABONNE:
                                echo "Abonné";
                                break;    
                        endswitch; 
                    ?>
                </td>

                <td>
                    <?= $abonne["pseudo"] ?>
                </td>

                <td>
                    <?= $abonne["mdp"] ? "****" : "" ?>
                </td>

                <td>
                    <?= $abonne["prenom"] . " " . $abonne["nom"] ?>
                </td>

                <td>
                    <a href="/abonne_modifier.php?id=<?= $abonne["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="/abonne_supprimer.php?id=<?= $abonne["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="/abonne_fiche.php?id=<?= $abonne["id"] ?>" class="btn btn-secondary">
                        <i class="fa fa-eye"></i>
                    </a>
                    
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
