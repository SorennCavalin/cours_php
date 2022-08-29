<?php

function classAuto($class)
{
    $class = str_replace("\\", "/", $class);
    require __DIR__ . "/../" . $class . ".php";
}
// pour que les classes necessaire se charges toutes seules
spl_autoload_register("classAuto");
