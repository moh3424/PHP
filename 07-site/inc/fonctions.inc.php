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
// OU

    return (isset($_SESSION['mombre']));


}