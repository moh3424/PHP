<?php

// Exercice :

/**
 * Vous allez créer la page de gestion des membres dans le back-office :
 * 
 * 1- Seul les admin ont accès à cette page. Les autres sont redirigés vers  connexion.php.
 * 2-Afficher dans cette page tous les membres inscrits sous forme de table HTML, avec toutes les infos SAUF le mot de passe.
 * 
 * 
 */

require_once '../inc/init.inc.php';

// 1- On vérifie si membre est admin :

    if(!internauteEstConnecteEtAdmin()){
        header('location:../connexion.php'); // si pas admin, on le redirige vers la page de connexion
        exit();
    }

    $membre = executeRequete("SELECT id_membre, pseudo, nom, prenom, email, civilite, ville, code_postal, adresse, statut FROM membre");
     
    // debug($membre);
    $contenu .='<table border = "1">';
    $contenu .='<tr>';
    $contenu .= '<td>id_membre</td>'  ;
    $contenu .= '<td>pseudo</td>' ;
   
    $contenu .= '<td>nom</td>' ;
    $contenu .= '<td>prenom</td>' ;
    $contenu .= '<td>email</td>' ;
    $contenu .= '<td>civilite</td>' ;
    $contenu .= '<td>ville</td>' ;
    $contenu .= '<td>code_postal</td>' ;
    $contenu .= '<td>adresse</td>' ;
    $contenu .='<td>statut</td>' ;

    $contenu .='</tr>';

    while ($inscrit = $membre->fetch(PDO::FETCH_ASSOC)){
        $contenu .= '<tr>';
        foreach ($inscrit as $indice => $info) {
            // Affichage de chaque ligne à chaque tour de boucle sauf "mdp"
           if ($indice != 'mdp'){

               $contenu .= '<td>' . $info . '</td>';
           }
            
        }
        $contenu .='</tr>';
    }
  
// Deuxieme Methode

    // while ($inscrit = $membre->fetch(PDO::FETCH_ASSOC)){
    //     //debug ($inscrit);
    //     $contenu .='<tr>';

    //         $contenu .= '<td>'. $inscrit['id_membre'].'</td>';
    //         $contenu .= '<td>'. $inscrit['pseudo'].'</td>';
    //         $contenu .= '<td>'. $inscrit['nom'].'</td>';
    //         $contenu .= '<td>'. $inscrit['prenom'].'</td>' ;
    //         $contenu .= '<td>'. $inscrit['email'].'</td>';
    //         $contenu .= '<td>'. $inscrit['civilite'].'</td>';
    //         $contenu .= '<td>'. $inscrit['ville'].'</td>' ;
    //         $contenu .= '<td>'. $inscrit['code_postal'].'</td>';
    //         $contenu .= '<td>'. $inscrit['adresse'].'</td>';
    //         $contenu .='<td>'. $inscrit['statut'].'</td>';

    //     $contenu .='</tr>';
    // }
    

   
    $contenu .='</table>';

    //------------------------AFFICHAGE---------------------------

require_once '../inc/haut.inc.php';
?>

<h1 class="mt-4">Gestion des membre</h1>

<?php echo $membre->rowCount(); ?>
    <?php
              echo $contenu ;
    ?>
 

 

<?php

require_once '../inc/bas.inc.php';