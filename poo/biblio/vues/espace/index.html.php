<h2>Mes informations</h2>
<ul class="list-group">
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Pseudo</strong>
            <span class="col-10"><?= $abonne["pseudo"] ?></span>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Mot de passe</strong>
            <span class="col-10">***</span>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Prénom</strong>
            <span class="col-10"><?= $abonne["prenom"] ?></span>
        </div>
    </li>
    <li class="list-group-item">
        <div class="d-flex">
            <strong class="col-2">Nom</strong>
            <span class="col-10"><?= $abonne["nom"] ?></span>
        </div>
    </li>
</ul>

<h2>Mes emprunts</h2>
<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <th>Livre</th>
        <th>Emprunté le</th>
        <th>Rendu le</th>
    </thead>
    <tbody>
        <?php foreach($emprunts as $emprunt): ?>
            <tr>
                <td><?= $emprunt["livre"] ?></td>
                <td><?= date("d/m/Y", strtotime($emprunt["date_sortie"])) ?></td>
                <td><?= !empty($emprunt["date_rendu"]) ? date("d/m/Y", strtotime($emprunt["date_sortie"])) : "à rendre" ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>