<?php

require_once 'inc/init.inc.php';


require_once 'inc/haut.inc.php'; // doctype, header, nav

echo'Ici le contenu spécifique de la page';

$resultat = $pdo->query("SELECT * FROM produit");

print_r($resultat);


require_once 'inc/bas.inc.php'; // footer et fermetures des balise