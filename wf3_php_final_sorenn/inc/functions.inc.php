<?php
function lien($controleur, $methode = "list", $id = null)
{
    return "?controler=$controleur&methode=$methode" . ($id ? "&id=$id" : "");
}



function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function d_exit($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}



function redirection($url)
{
    header("Location: $url");
    exit;
}
