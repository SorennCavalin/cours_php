<?php
session_start();
include_once "functions.inc.php";
$connexion = new PDO("mysql:host=localhost;dbname=bddtest", "root", "");
