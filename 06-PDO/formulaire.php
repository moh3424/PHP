<?php
// Nous allos créer un formulaire pour enregistrer un nouvel employé dans la BDD "entreprise".
echo '<h4> Nous allos créer un formulaire pour enregistrer un nouvel employé dans la BDD "entreprise".</h4>' ;
// Objectif : valider le formulaire et le sécurser avant insertion en BDD.
echo '<h4> Objectif : valider le formulaire et le sécurser avant insertion en BDD.</h4>' ;

$message =''; // pour afficher les messages à l'internautes

// 1- Création du formulaire :
    echo '<h3> 1- Création du formulaire :</h3>' ;

    var_dump($_POST);
    var_dump(DateTime::createFromFormat('d-m-Y','32-01-2015'));// pour tester la validation de la date en affichant sur le navigateur pour le developpeur

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

            function validateDate ($date, $format = 'd-m-Y'){// $format = 'd-m-Y' permet de donner une valeur par défaut au paramètre $format si on ne lui pas d'argument lors de l'appel de la fonction
               $d = DateTime::createFromFormat($format, $date); // Crée un objet date si la date est valide et qu'elle corrspond au format indiqué dans $format. Dans le cas contraire, retourne false (c'est- à - dir si la date n'est pas valide ou qu'elle ne correspond pas au format indiqué)

               if ($d && $d->format($format)== $date){ // si $d n'est pas false (voir ci-dessus) et que l'objet dat $d est bien égale à la date $date, c'est qu'il n'y a pas eu d'extrapolation sur la date : exemple de 32/01/2015 qui devient 01/02/2015. Dans ce cas la date est validé . On retourne true.

                   return true;
               }
               else {

                   return false;
               }
               
            }

            if (!isset($_POST['date_embauche']) || !validateDate($_POST['date_embauche'], 'Y-m-d')) $message .= '<div>La date n\'est pas valide .</div>'; // On entre dans la condition si l'indice "date_embauche" n'existe pas OU que la fonction validateDate() ne retourne false (attention à la présence du "!")

            // Insertion en BDD si il n'y a pas de message d'erreur :
            echo '<h3>  Insertion en BDD si il n\'y a pas de message d\'erreur :</h3>' ;

            if (empty($message)){// si le $message est vide c'est qu'il n'y a pas d'erreur

                // On échappe toutes les valeurs de $_POST :
                echo '<h5>  On échappe toutes les valeurs de $_POST :</h5>' ;
                foreach($_POST as $indice => $valeur){
                    $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
                }


                // On fait une requête préparée :
                echo '<h5>   On fait une requête préparée :</h5>' ;

                $result = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)");

                // $result->bindParam(':prenom', $_POST['prenom']);
                // $result->bindParam(':nom', $_POST['nom']);

                // $result->bindParam(':sexe', $_POST['sexe']);
                // $result->bindParam(':service', $_POST['service']);
             
                
                // $result->bindParam(':date_embauche', $_POST['date_embauche']);
                // $result->bindParam(':salaire', $_POST['salaire']);

                //  Version avec une boucle foreach :
                    echo '<h5> Version avec une boucle foreach :</h5>' ;
                    foreach($_POST as $indice=> &$valeur){ // pour que ça marche on a besoin d'une variable par référence
                        $result->bindParam($indice, $valeur);
                    }

                $req =$result->execute();// la methode execute() renvoie un booléen selon que la requête a marché (true) ou  pas (false)

                // Afficher un message de réussite ou d'écheque :

                if ($req){
                    $message .= '<div>L\'employé a bien été ajouté .</div>';
                }else {
                    $message .= '<div>Une erreur est survenue lors de l\'enregistrement. .</div>';
                }// fin de if ($req)



            }// fin de if(empty($message)) 




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