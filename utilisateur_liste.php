<?php
include "inc/init.inc.php";

$connexion = new PDO("mysql:host=localhost;dbname=bddtest", "root", "");
$request = $connexion->query("SELECT * FROM utilisateur");
$liste = $request->fetchALL(PDO::FETCH_ASSOC);
// $resultat = $connexion->query("");
// UPDATE utilisateur SET pseudo = 'dev' WHERE id = 2


include "vues/header.html.php";
include "vues/utilisateurs/liste.html.php";
include "vues/footer.html.php";
?>














<!-- < ? php
include "vues/header.html.php";

$connexion = new PDO("mysql:host=localhost;dbname=bddtest", "root", "");

$request = $connexion->query("SELECT * FROM utilisateur");
$utilisateurs = $request->fetchALL(PDO::FETCH_ASSOC);

foreach ($utilisateurs as $utilisateur) {
    foreach ($utilisateur as $champ => $valeur) {
        ecrire("<strong>$champ</strong> : $valeur");
    }
    echo "<hr>";
}
? >
<table class="table table-bordered">
    <tr>
        <th>id</th>
        <th>pseudo</th>
        <th>mdp</th>
    </tr>
    <tbody>
        < ? php

        foreach ($utilisateurs as $utilisateur) {
            echo "<tr>";
            foreach ($utilisateur as $champ => $valeur) {
                echo "<td> $valeur </td>";
            }
            echo "</tr>";
        }
        ? >
    </tbody>
</table>

< ? php
include "vues/footer.html.php"; -->