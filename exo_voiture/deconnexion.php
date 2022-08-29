<?php

require "inc/init.inc.php";
session_destroy();
$_SESSION["succes"] = "Vous êtes déconnecté";
redirection("/");