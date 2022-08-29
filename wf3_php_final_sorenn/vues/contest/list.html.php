<?php


foreach ($matchs as $match) :
    $id = $match->getId();
    $nicknames = Modeles\Bdd::connection()->query("SELECT p.id,p.nickname FROM player p JOIN player_contest pc ON p.id = pc.player_id WHERE pc.contest_id = $id")->fetchAll(PDO::FETCH_ASSOC);
    $numberOfPlayer = Modeles\Bdd::connection()->query("SELECT distinct(count(c.id)) as nombre FROM player_contest pc JOIN contest c ON c.id = $id AND pc.contest_id = $id")->fetch(PDO::FETCH_ASSOC);
    $isActive = $match->getStart_date();
    $dateActuelle = date("Y-m-d");
    if ($isActive > $dateActuelle) {
        $isActive = "";
    } elseif ($isActive == $dateActuelle) {
        $isActive = "active";
    } else {
        $isActive = "disabled";
    }
?>

    <div class="list-group m-2">
        <a href="<?= lien("contest", "infos", $match->getId()) ?>" class="list-group-item list-group-item-action flex-column align-items-start <?= $isActive ?>">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">
                    Tournoi de <?php foreach ($jeux as $jeu) {
                                    if ($jeu["id"] == $match->getGame_id()) {
                                        echo $jeu["title"];
                                    };
                                } ?>
                </h5>
                <small>
                    <?php if ($isActive == "active") {
                        echo "Match prévu pour le " . date("d/m/Y", strtotime($match->getStart_date()));
                    } elseif ($isActive == "disabled") {
                        echo "Match terminé le " . date("d/m/Y", strtotime($match->getStart_date()));
                    } else {
                        echo "Le match se déroulera le " . date("d/m/Y", strtotime($match->getStart_date()));
                    } ?>
                </small>
            </div>
            <p class="mb-1">Il y a <?= $numberOfPlayer["nombre"] ?> Participants :</p>
            <?php foreach ($nicknames as $pseudo) : ?>
                <small> - <?= $pseudo["nickname"] ?> <br></small>
            <?php endforeach; ?>

            <?php if ($match->getWinner_id()) : ?>
                <p class="mb-1">
                    Le gagnant est
                    <?php foreach ($nicknames as $pseudo) : ?>
                        <?= ($pseudo["id"] === $match->getWinner_id()) ? $pseudo["nickname"] : "" ?>
                    <?php endforeach; ?>
                </p>
            <?php endif ?>

        </a>
    </div>
<?php endforeach; ?>