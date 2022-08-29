<!-- solution 3 - SESSION -->
<?php
/**
 * session_start() : cette fonction doit être lancée sur toutes les pages du site pour pouvoir
 *      utiliser la superglobale $_SESSION. (s'il n'y a pas d'identifiant de session sur le 
 *      navigateur il sera créé).
 * 
 * $_SESSION est un array que l'on peut remplir comme on veut. 
 * 
 * session_destroy() : cette fonction permet de détruire la session. L'identifiant de session
 *      n'existe plus sur le serveur, la session n'existe plus, ni les données enregistrées 
 *      dans $_SESSION
 * 
 * unset($_SESSION["indice"])  : unset permet de détruire une variable. Souvent utilisée pour 
 *        supprimer un indice d'un array
 */

session_start();


/* 
    La fonction rand(min, max) retourne un nombre entier aléatoire compris 
    entre min et max


*/
include "vues/header.html.php"; ?>

<?php
$nbTentative = 1;
$nbAleatoire = rand(1, 10);
if (empty($_SESSION["nbAleatoire"])) {
    $_SESSION["nbAleatoire"] = $nbAleatoire;
}
echo $nbAleatoire . " - " . $_SESSION["nbAleatoire"];
if (!empty($_POST["nombre"])) {
    if ($_GET["tentative"] == 4) {
        echo "<div class='alert alert-info'>Perdu !</div>";
        echo "<a class='btn btn-secondary' href='devine.php'>Recommencer</a>";
        $_SESSION["nbAleatoire"] = null;
        exit;
    } else {
        $nbTentative = $_GET["tentative"] + 1;
    }
    if ($_SESSION["nbAleatoire"] == $_POST["nombre"]) {
        echo "<div class='alert alert-success'>Bien joué, vous avez deviné le nombre " . $_SESSION["nbAleatoire"] . "</div>";
        echo "<a class='btn btn-secondary' href='devine.php'>Recommencer</a>";
        session_destroy();
        exit;
    } else {
        echo "<div class='alert alert-danger'>Essaye encore</div>";
    }
}

?>

<form action="?tentative=<?= $nbTentative ?>" method="post">
    <div class="form-group">
        <label for="">Essayez de deviner un nombre entre 1 et 10 : </label>
        <input type="text" name="nombre" id="" class="form-control">
    </div>
    <input type="hidden" name="tentative" value="<?= $nbTentative ?>">

    <button type="submit" class="btn btn-primary">Deviner !</button>
    <button type="reset" class="btn btn-secondary">Effacer</button>
</form>

<?php include "vues/footer.html.php"; ?>



<!-- solution 1 -->
<?php
/* 
La fonction rand(min, max) retourne un nombre entier aléatoire compris 
entre min et max

EXO : faire un formulaire (en méthode GET, action = "") qui demande à l'utilisateur de deviner un
        nombre entre 1 et 10.
        Si le nombre tapé dans le formulaire correspond au nombre aléatoire,
        afficher "Bien joué, vous avez deviné le nombre ..." (sans le formulaire)
        Sinon afficher "Essayez encore" et le formulaire

*/
include "vues/header.html.php"; ?>

<?php
$nbAleatoire = 5 /*rand(1, 10)*/;
echo $nbAleatoire;
if (!empty($_GET["nombre"])) {
    if ($nbAleatoire == $_GET["nombre"]) {
        echo "<div class='alert alert-success'>Bien joué, vous avez deviné le nombre $nbAleatoire</div>";
        exit;
    } else {
        echo "<div class='alert alert-danger'>Essaye encore</div>";
    }
}

?>

<form>
    <div class="form-group">
        <label for="">Essayez de deviner un nombre entre 1 et 10 : </label>
        <input type="text" name="nombre" id="" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Deviner !</button>
    <button type="reset" class="btn btn-secondary">Effacer</button>
</form>

<?php include "vues/footer.html.php"; ?>

<!-- solution 2 -->
<?php
/* 
La fonction rand(min, max) retourne un nombre entier aléatoire compris 
entre min et max

EXO : faire un formulaire (en méthode GET, action = "") qui demande à l'utilisateur de deviner un
        nombre entre 1 et 10.
        Si le nombre tapé dans le formulaire correspond au nombre aléatoire,
        afficher "Bien joué, vous avez deviné le nombre ..." (sans le formulaire)
        Sinon afficher "Essayez encore" et le formulaire

*/
include "vues/header.html.php"; ?>

<?php
$nbTentative = 1;
$nbAleatoire = 5 /*rand(1, 10)*/;
// echo $nbAleatoire;
if (!empty($_POST["nombre"])) {
    if ($_GET["tentative"] == 4) {
        echo "<div class='alert alert-info'>Perdu !</div>";
        echo "<a class='btn btn-secondary' href='devine.php'>Recommencer</a>";
        exit;
    } else {
        $nbTentative = $_GET["tentative"] + 1;
    }
    if ($nbAleatoire == $_POST["nombre"]) {
        echo "<div class='alert alert-success'>Bien joué, vous avez deviné le nombre $nbAleatoire</div>";
        exit;
    } else {
        echo "<div class='alert alert-danger'>Essaye encore</div>";
    }
}

?>

<form action="devine.php?tentative=<?= $nbTentative ?>" method="post">
    <div class="form-group">
        <label for="">Essayez de deviner un nombre entre 1 et 10 : </label>
        <input type="text" name="nombre" id="" class="form-control">
    </div>
    <input type="hidden" name="tentative" value="<?= $nbTentative ?>">

    <button type="submit" class="btn btn-primary">Deviner !</button>
    <button type="reset" class="btn btn-secondary">Effacer</button>
</form>

<?php include "vues/footer.html.php"; ?>