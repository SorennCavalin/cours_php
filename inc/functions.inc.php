<?php

function ecrire($texte)
{
    echo "$texte<br>";
}

function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

/* EXO : 
    modifier la fonction 'operation' pour que l'on puisse passer un 3ième argument
    qui sera l'opérateur et qui peut avoir comme valeur (+ - / *)
    La fonction va renvoyer le résultat de l'addition si l'opérateur est +,
                                           la soustraction si l'opérateur est - 
                                           la multiplaction si l'opérateur est *
                                           la division si si l'opérateur est /    
*/
function operation($n1, $n2, $operateur)
{
    $resultat = null;
    switch ($operateur) {
        case "+":
            $resultat = $n1 + $n2;
            break;

        case "-":
            $resultat = $n1 - $n2;
            break;

        case "/":
            $resultat = $n1 / $n2;
            break;

        case "*":
            $resultat = $n1 * $n2;
            break;

        default:
            return "erreur";
    }

    return $resultat;
}


function redirection($url)
{
    header("Location: $url");
    exit;
};
