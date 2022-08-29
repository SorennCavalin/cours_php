<?php

$biblio = new PDO("mysql:host=localhost;dbname=biblio", "root", "");
$livre = $biblio->query("SELECT * FROM livre WHERE id=" . $_GET["id"])->fetch(PDO::FETCH_ASSOC);

echo json_encode($livre);
