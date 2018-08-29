


<?php


/*Sujet :

    1- Créer une base de données "contacts" avec une table "contact:

        id_contact            PK AI INT (3)
        nom                   VARCHAR (20)
        prenom                VARCHAR (20)
        telephone             VARCHAR (10)
        annee_rencontre       YEAR
        email                 VARCHAR (255) 
        type_contact          ENUM ('ami', 'famille', 'professionnel', 'autre')

    2- Créer un formulaire HTML (avec doctype ...) afin d'ajouter des contacts dans le BDD. le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.

    3- Sur le formulaire, effectuer les contrôles nécessaires :
        -Les champs nom et prénom contient 2 caractères minimum
        -le champ téléphone contien 10 chifres
        -L'année de rencontre doit être une année valid
        -Le type de contact doit être conforme à la liste des contacts
        -L'email doit être valide

        En cas d'erreur de saisie, afficher les messages d'erreur au dessus du formulaire.

    4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.




*/
// Variables

$inscription = true;// pour s'avoir si l'internaute vient de s'inscrire (on mettra la variable à true) et ne plus afficher le formulaire d'inscription
$nouvContact ='';
$contenu='';
$contenu1='';
$contenu2='';
$contenu3='';
$contenu4='';

// -Connexion à la base de données BDD:
$pdo = new PDO ('mysql:host=localhost;dbname=contacts', // driver mysql : serveur; nom de la PDD
                'root',// pseudo de la BDD
                '', // Mot de passe de la BDD
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// option1 : pour affichez les erreurs SQL
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') // option 2 : définit le jeu de caractères des échanges avec la BDD
                );



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
    $result ->execute($param); // on exécute la requête en lui donnant l'array présent dans $param qui associe tous les marqueurs à leur valeur

    return $result; // on retourne le résultat de la requête de SELECT

}/* fin function executeRequete($req, $param = array()) */


// Controle des champs :

if (!empty($_POST)){

    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20  ) $contenu1 .= '<h3 class="rouge">Le Prénom doit contenir entre 2 et 20 caractères.</h3>';

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20  ) $contenu2 .= '<h3 class="rouge">Le nom  doit contenir entre 2 et 20 caractères.</h3>';

    if (!isset($_POST['telephone']) || strlen($_POST['telephone']) != 10   ) $contenu3 .= '<h3 class="rouge">Le telephone doit contenir 10 caractères.</h3>';

    
    if (!isset($_POST['type_contact']) || ($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'autre' ) ) $contenu .= '<h3 class="rouge">Le type de contact n\'est pas mentionner</h3>';

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)  ) $contenu4 .= '<h3 class="rouge">Email est incorrect.</h3>';

     //-------------------------------
    // Si pas d'erreur sur le formulaire, on vérifie que le nom et le prenom sont disponible dans la BDD:

        if (empty($contenu)) { //si $contenu est vide, c'est qu'il n'y a pas d'erreur

            // Vérification du nom et prenom :
                $nouvContact = executeRequete("SELECT * FROM contact WHERE nom = :nom AND prenom = :prenom", array(':nom' => $_POST['nom'], ':prenom' => $_POST['prenom'])); // 
    
            if ($nouvContact->rowCount() >0){//si la requête retourn 1 ou plusieurs resultats c'est que le nom et le prénom existe en BDD
                $contenu.= '<h3 class ="red">Le contact existe déjà.</h3>';
            } else {
                // sinon le pseudo étant disponible, on enregitr le membre en BDD :
                executeRequete("INSERT INTO contact ( nom, prenom, email, type_contact, telephone, annee_rencontre) VALUES(:nom, :prenom, :email, :type_contact,                                             :telephone,:annee_rencontre  )",
                                                                      array(':nom'          => $_POST['nom'],
                                                                            ':prenom'       => $_POST['prenom'],
                                                                            ':email'        => $_POST['email'],
                                                                            ':type_contact' => $_POST['type_contact'],
                                                                            ':telephone'    => $_POST['telephone'],
                                                                            ':annee_rencontre' => $_POST['annee_rencontre']  
                                                                                ));
              $contenu .= '<h3 class="vert">Le contact est enregistré.</h3>';    
             $inscription = false; // pour ne plus afficher le formulaire sur cette page                                                              
            }// fin du else
    }/* fin if (empty($contenu)) */
}/* fin if (!empty($_POST)) */


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div{
            margin-top : 20px;
            height:50px;
            width: 200px;
        }
        label{
            margin-left : 20px;
            
        }

        input{
            margin-left : 20px;
        }
        .vert{
            background : green;
        }
        .rouge{
            color : red;
        }
    </style>
</head>
<body>

<form method ="post" action="">
    <div>
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" value="">
    </div>
    <?php echo  $contenu1; ?>

    <div>
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="">
    </div>
    <?php echo  $contenu2; ?>

    <div>
        <label for="telephone">Téléphone</label>
        <input type="text" id="telephone" name="telephone" value="">
    </div>
    <?php echo  $contenu3; ?>
    
        <label for="annee_rencontre">Année de rencontre</label>
        <select name="annee_rencontre" id="annee_rencontre">
        <?php
            for($j = 1918; $j<=2018; $j++){
               
                echo '<option>' .  $j . '</option>';
            }
        ?> 
        </select>
       
   

    <div>
        <label for="email">Email</label>
        <input type="text" name ="email" id ="email">   
    </div>
    <?php echo  $contenu4; ?>
  
        <label for="type_contact">Type de contact</label>
        <select name="type_contact" id="type_contact">
            <option value=""></option>
            <option value="ami">Ami</option>
            <option value="famille">Famille</option>
            <option value="professionnel">Professionnel</option>
            <option value="autre">Autre</option>
        
        </select>
    
    <div><input type="submit" value="valider"></div>

</form>
</body>
</html>