<?php

require "inc/init.inc.php";


$controler = $_GET["controler"] ?? "home";
$methode = $_GET["methode"] ?? "list";
$id = $_GET["id"] ?? null;

// Pour le changement automatique de la classe à appeler plutot que des if
$callControler = "Controlers\\" . ucfirst($controler) . "Controler";


$classControler = new $callControler;
// Pour le changement automatique de la methode à appeler plutot que des if
$classControler->$methode($id);
