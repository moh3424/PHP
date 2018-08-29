<?php


/*Sujet :

    -Créer une fonction qui permet de convertir une date FR en date US, ou inversement.
    Cette fonction prend 2 paramètres : une date et le format de conversion "US" ou "fr"
    
    -Vous validez  que le paramètre format de sortie est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas



*/

// Préambule à l'exercice :

$aujourdhui = date('d-m-y');// donne la date du jour au format indiqué
echo $aujourdhui .'<br>';

// -------

// Convertire une date d'un format vers un autre :

$date ='2018-08-24';
echo 'La date au format US : ' . $date . '<br>';

$objetDate = new DateTime($date);
echo 'La date au format FR : ' . $objetDate->format('d-m-Y');// la méthode format() permet de convertir un objet date selon le format indiqué

echo '<hr>';

// Votre exercice :


function converDate ($date, $format){
  if ($format == 'US'){
    $objetDate = new DateTime($date);
   return '<div>La date au format US : ' . $objetDate->format('Y-m-d') . '</div>';
  
   
  }elseif ($format == 'FR'){
    $objetDate = new DateTime($date);
   return '<div>La date au format FR : ' . $objetDate->format('d-m-Y') . '</div>';
   
   
  }else{
    return '<p>Le format de la date n\'est pa valide</p>';
  }
}


echo converDate('18-03-2018', 'US');

// Dexieme méthode du prof


function afficheDate ($date, $format){
    // Vérifier la valeur du paramètre $format :
    
        if ($format != 'US' && $format != 'FR'){
            return '<p>Erreur sur le format</p>';
        }
     
    // Une fois le(s) paramètre(s) validés, on fait le traitement :
    if ($format == 'US'){
        $objetDate = new DateTime($date);
        return 'La date au format US : ' . $objetDate->format('Y-m-d') .'</di>';
    }else {
        $objetDate = new DateTime($date);
        return '<div>La date au format FR : ' . $objetDate->format('d-m-Y') .'</di>';
    }
      
   
  }
  
  
  echo afficheDate('18-03-2018', 'US');




