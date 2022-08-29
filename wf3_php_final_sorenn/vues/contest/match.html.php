<?php
$id = $contest->getId();
$nicknames = Modeles\Bdd::connection()->query("SELECT p.id,p.nickname FROM player p JOIN player_contest pc ON p.id = pc.player_id WHERE pc.contest_id = $id")->fetchAll(PDO::FETCH_ASSOC);
$numberOfPlayer = Modeles\Bdd::connection()->query("SELECT distinct(count(c.id)) as nombre FROM player_contest pc JOIN contest c ON c.id = $id AND pc.contest_id = $id")->fetch(PDO::FETCH_ASSOC);
?>
<div class="card text-center">
    <div class="card-header">

    </div>
    <div class="card-body">
        <h5 class="card-title">Tournoi de <?= $jeux["title"] ?></h5>
        <p class="card-text"><?= $numberOfPlayer["nombre"] ?? 0 ?> Participants inscrits</p>
        <form method="post">
            <div class="form-group">
                <label for="player_id">Ajouter un joueur au tournoi</label>
                <label for="player_id">quel joueur?</label>
                <select name="player_id" id="player_id" class="form-control" aria-label="Default select example">
                    <option selected hidden>Choisissez un jeu</option>
                    <?php foreach ($players as $player) :  ?>
                        <option value="<?= $player->getId() ?>"><?= $player->getNickname() ?></option>
                    <?php endforeach ?>
                    <button type="submit" class="btn btn-primary">
                        Confirmer
                    </button>
                </select>
            </div>
        </form>
    </div>
    <div class="card-footer text-muted">
        Le tournoi se déroulera le <?= date("j/m/Y", strtotime($contest->getStart_date())) ?>
    </div>
</div>