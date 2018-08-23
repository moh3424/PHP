<?php

//-------------------fonction de debug----------------------

function debug($param){
    echo '<pre>';
        print_r($param);
    echo '</pre>';

}

//-------------------fonctions membres---------------------


//Fonction qui indique si l'internaute est connecté :

function internauteEstConnecte(){
    if(isset($_SESSION['mombre'])){// si la session "mombre"existe, c'est que l'internaute est passé par la page de connexion et que nous avons créé cet indice dans $_SESSION
        return true;
    }else{
        return false;
    }
// OU on peut ecrire cette condition autrement:

    return (isset($_SESSION['mombre']));
}

// Fonction qui indique si le membre est admin connecté :
function internauteEstConnecteEtAdmin(){
    if (internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){// si membre connecté ET que son statt dans la session vaut 1, il est connecté
        return true;
    }else {
        return false;
    }

    // OU on peut ecrire cette condition autrement:
    return(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1);


}/*  fin if internauteEstConnecteEtAdmin() */

//----------------------fonction de requête-----------------------------------

function executeRequete($req, $param = array()){ // cette fonction attend deux valeurs :une requête SQL (obligatoire) et un array qui associe les marqueurs aux valeurs (non obligatoire car on a affecté au paramètre $param un array())vide par défaut

    // Echappment des données reçues avec htmlspecialchars :

    if (!empty($param)){//  si l'array $param n'est pas vide, je peux faire la boucle :

        foreach($param as $indice => $valeur){
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES);// on échappe les valeurs de $param que l'on remet à leur place dans $param[$indice]
        }

    }/* fin if (!empty($param)) */

    global $pdo; // permet d'avoir accès à la variable $pdo définie dans l'espace global (c'est à dire hors de cette fonction)au sein de cette fonction

    $result = $pdo->prepare($req); // on prépare la requête envoyée à notre fonction
    $result->execute($param); // on exécute la requête en lui donnant l'array présent dans $param qui associe tous les marqueurs à leur valeur

    return $result; // on retourne le résultat de la requête de SELECT

}