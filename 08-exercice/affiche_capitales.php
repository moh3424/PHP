<?php

/* Sujet :
    Vous créer un tableau PHP contenant les pays suivants:
    -France
    -Italie
    -Espagne
    -Inconnu
    -Allemagne

    Vous leur assocez les valeurs suivantes :
    -Paris
    -Rome
    -Madrid
    -'?'
    -Berlin

    Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un <p></p>, où X remplace la capitale et Y le pays.

    Pour le pays "inconnu", vous affichez "La capitale inconnu n'existe pas !" à la place de la phrase précédente.


*/
echo '<div><h2>1- Création d\'un tableau PHP contenant les pays demander dans l\'exercice</h2></div>';

$tableau = ['France', 'Italie', 'Espagne', 'Inconnu', 'Allemagne'];

echo '<pre>';
var_dump($tableau);
echo '<pre>';


echo '<div><h2>2- Association des valeur des pays aux valeurs capital </h2></div>';

$table_assoc = array(
    'France'    => 'Paris',
    'Italie'    => 'Rome',
    'Espagne'   => 'Madrid',
    'Inconnu'   => '?',
    'Allemagne' => 'Berlin'
);
echo '<pre>';
var_dump($table_assoc);
echo '<pre>';


echo '<div><h2>2-1 Parcours du tableau associatif </h2></div>';

foreach($table_assoc as $indice => $valeur){
    if ($indice == 'Inconnu'){

        echo '<div><p> La capital de : '.$indice . ' n\'existe pas !</p></div>';
    }else{
    
    echo '<div><p> La capital : '.$valeur .' se situe en '. $indice .'</p></div>';
    }
}