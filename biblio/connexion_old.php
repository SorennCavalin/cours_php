<?php

require "inc/init.inc.php";

if( $_POST ){
    extract($_POST);
    if( !empty($pseudo) && !empty($mdp) ){
        // $requete = connexion()->query("SELECT * FROM abonne WHERE pseudo = '$pseudo' AND mdp = '$mdp'");
        
        // "SELECT * FROM abonne WHERE pseudo = '' OR 1 OR '' AND mdp = 'abdou' 
        /* Lorsque que l'on fait une requête préparée, on peut utiliser des paramètres au lieu de 
            donner de valeurs. Ces paramètres sont comme des variables, il faut leur donner une valeur
            avant de pouvoir exécuter la requête
         */
        $requete = connexion()->prepare("SELECT * FROM abonne WHERE pseudo = :pseudo AND mpd = :mdp");
        // La fonction bindValue permet de donner une valeur à un paramètre d'une requête préparée
        $requete->bindValue(":pseudo", $pseudo);
        $requete->bindValue(":mdp", $mdp);
        // Après avoir lié les paramètres à des valeurs, la fonction execute() permet d'exécuter la 
        // requête. Cette fonction renvoie un boolean
        $resultat = $requete->execute();

        if( $resultat && $requete->rowCount() > 0){
            $_SESSION["succes"] = "Bonjour $pseudo, vous êtes connecté";
        } else {
            $_SESSION["erreur"] = "Les identifiants sont erronés";
        }
    } else {
        $_SESSION["erreur"] = "Le pseudo et le mot de passe sont obligatoires";
    }
}
affichage("form_connexion.html.php", [
    "h1" => "Entrez vos identifiants de connexion"
]);
