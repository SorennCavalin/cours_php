<!DOCTYPE html>
  <html>
    <head>
        <title>page</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Demo Project">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css"></style>
    </head>
    <body>
        

<?php

    if(isset($messageErreur)){
        echo $messageErreur;
        exit;
    } else {

        function multiplication ($nb) {
            $multiplie = [];
            if ($nb > 0 && $nb<10){
            for ($i = 1 ; $i < 11 ; $i++){
                array_push($multiplie, ($nb * $i)) ;
            }
            } else {
                $messageErreur = "Veuillez rentrer un chiffre de 1 a 9";
                return $messageErreur;
            };
            return $multiplie;
        }   
        $tm = multiplication(2);

        echo "<table class='table table-bordered'>";
        $compte = 1;
        echo "<tr> <td colspan='2'> table de multiplication  </td> </tr>";
        foreach($tm as $multiple){
            echo "<tr> <td> fois $compte </td> <td> $multiple </td> </tr>";
            $compte++;
        }
        echo "</table>";

        
    }


?>

    </body>
  </html>




