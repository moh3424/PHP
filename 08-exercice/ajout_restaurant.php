<?php
$contenu ='';
/*
    Sujet :

    1- Créer une BDD "restaurants" avec une table "restaurant"

        id_restaurant        PK AI INT (3)
        nom                  VARCHAR (100)
        adresse              VARCHAR (255)
        telephone            VARCHAR (10)
        type                 ENUM ('gastronomique', 'brasserie','pizzeria' , 'autre')
        note                 INT(1)
        avis                 TEXT

    2- Créer un formulaire HTML (avec doctype.....) afin d'ajouter un restaurant en BDD. Les champs type et note (de 1 à 5) sont des menus déroulants.

    3- Effectuer les vérifications nécessaires :
        le champ nom contient 2 caractères minimum
        le champ adresse ne doit pas être vide
        le téléphone doit contenir 10 chiffres
        la note doit être conforme à la liste des types de la BDD
        la note est un nombre entier entre 1 et 5
        l'avis ne doit pas être vide
        En cas d'erreur de saisie, afficher un message au-dessus du formulaire.

    4- Ajouter un ou plusieurs restaurants à la BDD et afficher un message de succès ou d'échec lors de l'enregistrement

*/


// -Connexion à la base de données BDD:
$pdo = new PDO ('mysql:host=localhost;dbname=restaurants', // driver mysql : serveur; nom de la PDD
                'root',// pseudo de la BDD
                '', // Mot de passe de la BDD
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// option1 : pour affichez les erreurs SQL
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') // option 2 : définit le jeu de caractères des échanges avec la BDD
                );



// Validation des champs:
var_dump($_POST);
if (!empty($_POST)){

    
    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20  ) $contenu .= '<p class="rouge">le champ nom contient 2 caractères minimum .</p>';
    
    if (!isset($_POST['adresse']) || strlen($_POST['adresse']) == 0  ) $contenu .= '<p class="rouge">le champ adresse ne doit pas être vide.</p>';

    if (!isset($_POST['telephone']) || !ctype_digit($_POST['telephone']) ||strlen($_POST['telephone']) != 10   ) $contenu .= '<p class="rouge">Le telephone doit contenir 10 caractères.</p>';// ctype_digit()
    
    
    if (!isset($_POST['type']) || ($_POST['type'] != 'gastronomiaue' && $_POST['type'] != 'brasserie' && $_POST['type'] != 'pizzeria' && $_POST['type'] != 'autre' ) ) $contenu.= '<p class="rouge">Le type de restaurant n\'est pas mentionner</p>';// 

    if (!isset($_POST['note']) || ($_POST['note'] != '1' && $_POST['note'] != '2' && $_POST['note'] != '3' && $_POST['note'] != '4' && $_POST['note'] != '5')) $contenu.= '<p class="rouge">la note est un nombre entier entre 1 et 5. </p>';// 

    if (!isset($_POST['avis']) || strlen($_POST['avis']) == 0 ) $contenu .= '<p class="rouge">l\'avis ne doit pas être vide.</p>';

        // Si pas d'erreur sur le formulaire, on vérifie que le nom et le prenom sont disponible dans la BDD:

    if (empty($contenu)) { //si $contenu est vide, c'est qu'il n'y a pas d'erreur
        // On échappe toutes les valeurs de $_POST :
            foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }


// On fait une requête préparée :

    $result = $pdo->prepare("INSERT INTO restaurant (nom,adresse, telephone, type, note, avis) VALUES (:nom, :adresse, :telephone, :type, :note, :avis)");

    $result->bindParam(':nom', $_POST['nom']);
    $result->bindParam(':adresse', $_POST['adresse']);

    $result->bindParam(':telephone', $_POST['telephone']);
    $result->bindParam(':type', $_POST['type']);

    
    $result->bindParam(':note', $_POST['note']);
    $result->bindParam(':avis', $_POST['avis']);

  
    $req =$result->execute();// la methode execute() renvoie un booléen selon que la requête a marché (true) ou  pas (false)

    // Afficher un message de réussite ou d'écheque :

        if ($req){
            $contenu .= '<div class="vert">Le nouveau resaurant a bien été ajouté .</div>';
            }else {
            $contenu .= '<div class="rouge">Une erreur est survenue lors de l\'enregistrement. .</div>';
        }// fin de if ($req)
    }/* fin if (empty($contenu)) */

    





} /* fin if (!empty($_POST)) */



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire d'ajout</title>
    <style>
        .formDiv{
            margin-top : 20px;
            height:50px;
            width: 200px;
        }
        label{
            margin-left : 20px;
            
        }
        .mt{
            position:relative;
            top : 200px;
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
    <h1>Formulaire d'ajout d'un restauran dans la BDD:</h1>

        <?php echo $contenu;?>
    <form method ="post" action="">
        <div class="formDiv">
        <label for="nom ">Nom:</label>
        <input type="text" name="nom" id ="nom" value="">
        </div>

        <div class="formDiv">
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id ="adresse" value="">
        </div>

        <div class="formDiv">
        <label for="telephone">Telephone :</label>
        <input type="text" name="telephone" id ="telephone" value="">
        </div>

        <div class="formDiv">
        <label for="type">Type :</label>
        <select name="type" id="type">
            <option value="">gastronomique</option>
            <option value="">brasserie</option>
            <option value="">pizzeria</option>
            <option value="">autre</option>
        </select>
        </div>

        <div class="formDiv">
        <label for="note">Note</label>
        <select name="note" id="note">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
            <option value="">5</option>
        </select>
        </div>

        <div class="formDiv">
            <label for="avis">Votre avis</label>
            <textarea name="avis" id="avis" cols="30" rows="10" placeholder ='Votre avis'></textarea>
        </div>

        <div class="formDiv mt">
            <input type="submit" value="Ajouter">
        </div>
    </form>

    
</body>
</html>