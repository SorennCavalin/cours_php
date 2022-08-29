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
                    <?= $abonne->getId() ?>
                </td>

                <td>
                    <?php 
                        switch($abonne->getNiveau()): 
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
                    <?= $abonne->getPseudo() ?>
                </td>

                <td>
                    <?= $abonne->getMdp() ? "****" : "" ?>
                </td>

                <td>
                    <?= $abonne->getPrenom() . " " . $abonne->getNom() ?>
                </td>

                <td>
                    <a href="<?= lien("abonne", "modifier", $abonne->getId()) ?>" class="btn btn-secondary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?= lien("abonne", "supprimer", $abonne->getId()) ?>" class="btn btn-secondary">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="<?= lien("abonne", "fiche", $abonne->getId()) ?>" class="btn btn-secondary">
                        <i class="fa fa-eye"></i>
                    </a>
                    
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
