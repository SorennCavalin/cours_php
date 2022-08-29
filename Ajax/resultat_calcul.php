<?php

if (!empty($_GET)) {
    $nb1 = $_GET["nb1"];
    $nb2 = $_GET["nb2"];
    $nb3 = $nb1 + $nb2;
    echo "$nb3";
} else {
    echo "calcul impossible sans valeurs données";
}
include "index.html";
