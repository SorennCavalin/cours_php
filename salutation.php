<?php
include "vues/header.html.php";
// if (!empty($_POST)) {
//     $prenom = $_POST["prenom"];
//     if (!empty($prenom)) {
//         echo "<div class='alert alert-success'>Bonjour $prenom.</div>";
//     }
// }
// ? >
// <?php if (empty($prenom)) : ? >
//     <form action="" method="post">
//         <div class="form-group">
//             <label for="prenom">prenom</label>
//             <input type="text" name="prenom" id="prenom" class="form-control">
//         </div>
//         <div class="d-flex">
//             <button type="submit" class="btn btn-primary mr-2">Se connecter</button>
//             <button type="reset" class="btn btn-danger">Annuler</button>
//         </div>
//     </form>
// <?php endif;
$numero = 0;
if (!empty($_POST)) {
    $numero = $_POST["numero"];
    if ($numero == 10) {
        echo "<div class='alert alert-success'> $numero </div>";
    } elseif (isset($numero) && $numero != 10) {
        echo "<div class='alert alert-danger'>veuillez rentrer le bon numero.</div>";
    }
}
?>
<?php if ($numero != 10) : ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="numero">numero</label>
            <input type="text" name="numero" id="numero" class="form-control">
        </div>
        <div class="d-flex">
            <button type="submit" class="btn btn-primary mr-2">envoyer</button>
        </div>
    </form>
<?php endif;

include "vues/footer.html.php";
