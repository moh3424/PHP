<?php
// Nous allos créer un formulaire pour enregistrer un nouvel employé dans la BDD "entreprise".
echo '<h4> Nous allos créer un formulaire pour enregistrer un nouvel employé dans la BDD "entreprise".</h4>' ;
// Objectif : valider le formulaire et le sécurser avant insertion en BDD.
echo '<h4> Objectif : valider le formulaire et le sécurser avant insertion en BDD.</h4>' ;

$message =''; // pour afficher les messages à l'internautes

// 1- Création du formulaire :
    echo '<h3> 1- Création du formulaire :</h3>' ;

    var_dump($_POST);

    //1- Connexion a la BDD :
    echo '<h4> 1- Connexion a la BDD :</h4>' ;
    $pdo = new PDO ('mysql:host=localhost;dbname=entreprise', // driver mysql : serveur; nom de la PDD
                'root',// pseudo de la BDD
                '', // Mot de passe de la BDD
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// option1 : pour affichez les erreurs SQL
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') // option 2 : définit le jeu de caractères des échanges avec la BDD
                );

    // 3- Traitement du formulaire:
        echo '<h4> 3- Traitement du formulaire:</h4>' ;

        if(!empty($_POST)){// si $_POST est rempli c'est que le formulaire a été soumis
            // Controles sur le formulaire:
            echo '<h5> 3-1  Contrôles sur le formulaire</h5>' ;
            if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 3 || strlen ($_POST['prenom']) > 20) $message .= '<div>le prénom doit comporter plus de 3  et inférieur 20 caractère.</div>';
            // on vérifie si l'indice "prenom"existe bien, s'il n'existe pas on met un message à l'intérnaute. On vérifie aussi sa langueur qui doit être comprise entre 3 et 20 caractères
            if (!isset($_POST['nom']) || strlen($_POST['nom']) < 3 || strlen ($_POST['nom']) > 20) $message .= '<div>le nom doit comporter plus de 3  et inférieur 20 caractère.</div>';

            if (!isset($_POST['sexe']) || ($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f')) $message .= '<div>Le sexe n\'est pa corecte.</div>';

            if (!isset($_POST['service']) || strlen($_POST['service']) < 3 || strlen ($_POST['service']) > 20) $message .= '<div>le service doit comporter plus de 3  et inférieur 30 caractère.</div>';

            if (!isset($_POST['salaire']) || !is_numeric($_POST['salaire'])) $message .= '<div>Le salaire doit être un nombre.</div>';// is_numeric vérifie si la valeur est bien un nombre ou une chaine numérique


            // Validation de la date :

            function validateDate ($_date, $format = 'd-m-Y'){// $format = 'd-m-Y' permet de donner une valeur par défaut au paramètre $format si on ne lui pas d'argument lors de l'appel de la fonction
                return true;
            }

            if (!isset($_POST['date_embauche']) || !validateDate($_POST['date_embauche'], 'Y-m-d')) $message .= '<div>La date n\'est pas valide .</div>';


            }// fin du if(!empty($_POST))
       
        echo $message;
    ?>



<form action="" method ="post">

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" value=""><br><br>

     <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" value=""><br><br>

    <label>Sexe</label><br>
    <input type="radio" id="sexe" name="sexe" value="m" checked>homme
    <input type="radio" id="sexe" name="sexe" value="f" checked>femme<br><br><br>

     <label for="service">Service</label><br>
    <input type="text" id="service" name="service" value=""><br><br>

    <label for="date_embauche">date d'embauche</label><br>
    <input type="text" id="date_embauche" name="date_embauche"  placeholder="AAAA-MM-JJ" value=""><br><br>

     <label for="salaire">Salaire</label><br>
    <input type="text" id="salaire" name="salaire"  value=""><br><br>

    <input type="submit" value="enregistrement">

    



</form>