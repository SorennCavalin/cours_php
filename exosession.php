<?php

session_start();
include "vues/header.html.php";
if (!empty($_GET["color"])) {
    $_SESSION["color"] = $_GET["color"];
    header("location: couleur.php");
    exit;
}
// $_SESSION["color"] = $_GET["color"] ?? null ;
echo $_SESSION["color"];
?>
<form action="" method="">
    <div class="form-group">
        <label for="color">Choisissez votre couleur préférée!</label>
        <input type="color" name="color" id="" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Choisir</button>
</form>


<?php
include "vues/footer.html.php";
