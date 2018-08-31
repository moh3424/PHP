


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

// -Connexion à la base de données BDD:
$pdo = new PDO ('mysql:host=localhost;dbname=contacts', // driver mysql : serveur; nom de la PDD
                'root',// pseudo de la BDD
                '', // Mot de passe de la BDD
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// option1 : pour affichez les erreurs SQL
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') // option 2 : définit le jeu de caractères des échanges avec la BDD
                );







var_dump($_POST);


//Traitement du formulaire :

if (!empty($_POST)){

    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20  ) $contenu .= '<p class="rouge">Le Prénom doit contenir entre 2 et 20 caractères.</p>';

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20  ) $contenu .= '<p class="rouge">Le nom  doit contenir entre 2 et 20 caractères.</p>';

    if (!isset($_POST['telephone']) || !ctype_digit($_POST['prenom']) ||strlen($_POST['telephone']) != 10   ) $contenu .= '<p class="rouge">Le telephone doit contenir 10 caractères.</p>';// ctype_digit()

    
    if (!isset($_POST['type_contact']) || ($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'autre' ) ) $contenu.= '<p class="rouge">Le type de contact n\'est pas mentionner</p>';// 

    if (!isset($_POST['annee_rencontre']) || !ctype_digit($_POST['annee_rencontre']) || $_POST['annee_rencontre']<(date('Y')-100) || $_POST['annee_rencontre'] > date('Y')) $contenu .= '<p class="rouge">La date est incorect.</p>';// a retenir (a utilisé)

    // OU :
    // On réutilise la fonction utilisateur validateDate() :
    function validateDate ($date, $format = 'd-m-Y'){// $format = 'd-m-Y' permet de donner une valeur par défaut au paramètre $format si on ne lui pas d'argument lors de l'appel de la fonction
        $d = DateTime::createFromFormat($format, $date); // Crée un objet date si la date est valide et qu'elle corrspond au format indiqué dans $format. Dans le cas contraire, retourne false (c'est- à - dir si la date n'est pas valide ou qu'elle ne correspond pas au format indiqué)

        if ($d && $d->format($format)== $date){ // si $d n'est pas false (voir ci-dessus) et que l'objet dat $d est bien égale à la date $date, c'est qu'il n'y a pas eu d'extrapolation sur la date : exemple de 32/01/2015 qui devient 01/02/2015. Dans ce cas la date est validé . On retourne true.

            return true;
        }
        else {

            return false;
        }
        
     }// /* fin function validateDate ($date, $format = 'd-m-Y')*/

     if(!isset($_POST['annee_rencontre']) || !validateDate($_POST['annee_rencontre'], 'Y')) $contenu .= '<p class="rouge">La date est incorect.</p>';// fonction aussi pour valider l'url


    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)  ) $contenu .= '<p class="rouge">L\'mail est incorrect.</p>';

     //-------------------------------
    // Si pas d'erreur sur le formulaire, on vérifie que le nom et le prenom sont disponible dans la BDD:

        if (empty($contenu)) { //si $contenu est vide, c'est qu'il n'y a pas d'erreur
        // On échappe toutes les valeurs de $_POST :
            echo '<h5>  On échappe toutes les valeurs de $_POST :</h5>' ;
            foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }


 // On fait une requête préparée :

    $result = $pdo->prepare("INSERT INTO contact (prenom, nom, telephone, annee_rencontre, type_contact, email) VALUES (:prenom, :nom, :telephone, :annee_rencontre, :type_contact, :email)");

    $result->bindParam(':prenom', $_POST['prenom']);
    $result->bindParam(':nom', $_POST['nom']);

    $result->bindParam(':telephone', $_POST['telephone']);
    $result->bindParam(':annee_rencontre', $_POST['annee_rencontre']);

    
    $result->bindParam(':type_contact', $_POST['type_contact']);
    $result->bindParam(':email', $_POST['email']);

    //  Version avec une boucle foreach :
        //  echo '<h5> Version avec une boucle foreach :</h5>' ;
        //  foreach($_POST as $indice=> &$valeur){ // pour que ça marche on a besoin d'une variable par référence
        //      $result->bindParam($indice, $valeur);
        //  }

    $req =$result->execute();// la methode execute() renvoie un booléen selon que la requête a marché (true) ou  pas (false)

    // Afficher un message de réussite ou d'écheque :

    if ($req){
        $contenu .= '<div class="vert">Le contacte a bien été ajouté .</div>';
        }else {
        $contenu .= '<div class="rouge">Une erreur est survenue lors de l\'enregistrement. .</div>';
    }// fin de if ($req)
        }/* fin if (empty($contenu)) */
}/* fin if (!empty($_POST)) */


?>
<!DOCTYPE html>
<html lang="fr">
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
<?php echo  $contenu; ?>
<form method ="post" action="">
    <div>
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" value="">
    </div>
   

    <div>
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="">
    </div>


    <div>
        <label for="telephone">Téléphone</label>
        <input type="text" id="telephone" name="telephone" value="">
    </div>
   
    
        <label for="annee_rencontre">Année de rencontre</label>
        <select name="annee_rencontre" id="annee_rencontre">
        <?php
                echo '<option value=""></option>';
            for($j = date('Y')-100; $j<=date('Y'); $j++){// date('Y') donne l'année en cours soit 2018
               
                echo '<option>' .  $j . '</option>';
                //Ou bien echo "<option>$j</option>";
            }
        ?> 
        </select>
       
  

    <div>
        <label for="email">Email</label>
        <input type="text" name ="email" id ="email">   
    </div>
   
  
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