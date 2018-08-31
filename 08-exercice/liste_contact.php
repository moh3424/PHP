<?php

/*
        Sujet :


        - Afficher dans une table HTML (avec doctype...) la liste des contacts avec les champs nom, prenom et telephone, et un champ suplémentaire "autres infos" aui est un lien qui permet d'afficher le détail de chaque contact.

        2- Afficher sous la table HTML, le détail du contact quand on clique sur son lien "autres infos"





*/
$contenu ='';

$pdo = new PDO ('mysql:host=localhost;dbname=contacts', // driver mysql : serveur; nom de la PDD
                'root',// pseudo de la BDD
                '', // Mot de passe de la BDD
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// option1 : pour affichez les erreurs SQL
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') // option 2 : définit le jeu de caractères des échanges avec la BDD
                );



$resultat =$pdo->prepare("SELECT id_contact, prenom, nom, telephone FROM contact");
$resultat->execute();
print_r ($resultat);

// Traitement de $_GET :

if (isset($_GET['id_contact'])){// si existe l'indice "id_contact" dans $_GET, c'est que cet indice est passé dans l'url, donc que l'internaute a cliqué sur des liens "autres infos"


    $_GET['id_contact'] = htmlspecialchars($_GET['id_contact'], ENT_QUOTES);// pour se pémunir des injections CSS ou JS via l'url
    $resultat = $pdo->prepare("SELECT *  FROM contact WHERE id_contact = :id_contact");// preparer la requête
    $resultat->bindParam(':id_contact', $_GET['id_contact']);
    $resultat->execute();// $resultat est un objet
    $contact = $resultat->fetch(PDO::FETCH_ASSOC);// On transforme l'objet $resultat en un array associatif $contact. Pas de boucle car on n'a qu'un seul résultat ici

    // print_r($contact);

    // affichage des détailles des contacts avec foreach () mais on ne peut pas les afficher on HTML
    // foreach ($contact as $valeur){
    //     $contenu .= '<p>' . $valeur . '</p>';
    // }

    // verssion sans boucle foreache :

        if (!empty($contact)){

            $contenu .= '<p>Non :' .$contact['nom']. '</p>';
            $contenu .= '<p>Prénom :' .$contact['prenom']. '</p>';
            $contenu .= '<p>Téléphone :' .$contact['telephone']. '</p>';
            $contenu .= '<p>Email :' .$contact['email']. '</p>';
            $contenu .= '<p>Année de rencontre :' .$contact['annee_rencontre']. '</p>';
            $contenu .= '<p>Type de contact :' .$contact['type_contact']. '</p>';
        }else {
            $contenu .= '<p>Ce contact n\'existe pas !</p>';
        }/* fin if (!empty($contact)) */

    
//   MON CODE :
// $resultat = $pdo->prepare("SELECT email, type_contact, annee_recontre FROM contact WHERE id_contact = :id_contact");

//    $resultat->execute();
//    print_r ($resultat);
//    $contact = $resultat->fetch(PDO::FETCH_ASSOC);
//    $contact->bindParam(':id_contact', $_GET['id_contact']);
//    $message .=   $contact['email'];

  
}/* fin  if (isset($_GET['id_contact']))*/


// $resultat->execute();
// $donnees = $resultat->fetch(PDO::FETCH_ASSOC);







?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Affichage des contacts</title>
</head>
<body>
    <h1>AFFICHAGE DES CONTACTS</h1>

<table border = "1">
    <tr>
		<th>prenom</th>
		<th>nom</th>
		<th>telephone</th>
        <th>autres infos</th>
	</tr>
    <?php while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
		echo '<tr>';
			// Affichage des infos de chaque ligne $ligne :
			foreach($ligne as $indice=>$info){
              if ($indice != 'id_contact'){
                  // echo "<td>$info </td>";
                   echo '<td>' . $info . '</td>';
              }
            }
            echo '<td><a href="?id_contact='.$ligne['id_contact'].' ">Autre Infos</a></td>';
		echo '</tr>';
      } 
     
    ?>

</table>
<?php echo $contenu;?>
</body>
</html>