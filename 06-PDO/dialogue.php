<?php

//-----------------
// Cas pratique : espace decommentaires
//-------------------------------------


//Objectif : créer un formulaire pour poster des commentaires et la sécuriser.

/**
 * Créer une BDD  : Dialogue
 * Table          :commentaire
 * Champs         :id_commentaire    INT (3) PK -AI
 *                :pseudo            INT()   
 *                 message
 *                 date_enregitrement
 * 
 * 
*/

// . Connextion a la BDD et le traitement de $_POST:
echo'<h3> Connextion a la BDD et le traitement de $_POST:</h3>';


$pdo = new PDO ('mysql:host=localhost;dbname=dialogue', // driver mysql : serveur; nom de la PDD
                'root',// pseudo de la BDD
                '', // Mot de passe de la BDD
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// option1 : pour affichez les erreurs SQL
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') // option 2 : définit le jeu de caractères des échanges avec la BDD
                );
    echo '<pre>';            
    var_dump($pdo);
    echo '<pre>'; 
    echo '<pre>';            
    var_dump($pdo);
    echo '<pre>';
  

// var_dump($_POST); // ou bien print_r($_POST)
echo'<h4> Traitement contre les failles JS (XSS : Cross Site Script) ou les failles CSS: On parle d\'échappement des données recues :</h4>';

echo'<h5> On commence par mettre du code CSS dans le champ "message" : '. htmlentities('<style>body{display:none}</style>' ) .  ':</h5>';

if (!empty($_POST)){// signifie si le formulaire est rempli
    //Traitement contre les failles JS (XSS : Cross Site Script) Ou les failles CSS: On parle d\'échappement des données recues:
    

    // On commence par mettre du code CSS dans le champ "message" : <style>body{display:none}</style>
    // htmlentities() permet d'afficher les balises

    // Pour s'en prémunir :
    echo'<h4> Pour s\'en prémunir : On utilise la méthode htmlspecialchars(la valeur du champ en POST)</h4>';
    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo'], ENT_QUOTES); // convertit les caractères spéciaux (<, >, &, "", '') en entités HTML (exemple : le > devien &lt; ) ce qui permet de rendre inofensives les balises HTML. On parle d'échappement des données reçus.
    $_POST['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES);

    //Insertion du commentaire de l'internaute en BDD :nous allons faire une première requête qui n'est pas protègée contre les injections et qui n'accepte pas les apostrophes
    // $resultat = $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')");
      // Nous faison l'injection SQL suivante dans le champs "message" : ok');DELETE FROM commentaire;( 
// pour se prémunir des injections SQL, Nous faisons une requête préparée. Par ailleurs, elle permettra la saisie d'apostrophes par l'internaute :
$resultat = $pdo->prepare("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message)");//preparer la requeête pour évité les injection avec la methode prepare
$resultat->bindParam(':pseudo', $_POST['pseudo']);
$resultat->bindParam(':message', $_POST['message']);

$resultat->execute();

// Comment ça marche ? le fait de mettre des marqueurs dans la requête permet de ne pas concaténer les injections SQL avec l'injection SQL. Par ailleurs, en faisant un bindParam(), les instructions SQL sont dissociées les unes des autres et neutralisées par PDO qui les transforment en strings inoffensifs. En effat, le SGBD attends des valeurs à la place des marqueurs dont il sait q'elles ne sont pas du code à exécuter.


}








?>

<!--1. Formulaire de saisie des messages -->
<h1>Votre message</h1>

<form action="" method="post">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value="<?php echo $_POST['pseudo'] ?? '';?>"><br><!-- l'opération "??" en PHP7 signifie "prend le premier qui exist". Ici on affiche donc $_POST['pseudo] s'il existe, sinon un string vide-->

    <label for="message">Message</label><br>
    <textarea name="message" id="message" cols="30" rows="10"><?php echo $_POST['message'] ?? '';?></textarea><br>

    <input type="submit" name ="envoi" value ="envoyer">
</form>




<?php
// III. AFFICHAGE DES MESSAGES:
echo '<h3> III. AFFICHAGE DES MESSAGES :</h3>';
$resultat = $pdo->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");

echo '<h2>' . $resultat->rowCount() . 'commentaires</h2>' ;

while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
  //  var_dump($commentaire);
  echo '<p> Par' . $commentaire['pseudo'] .' le ' .$commentaire['datefr'] . ' à ' .$commentaire['heurefr'] . ' .</p>';
  echo '<p>' . $commentaire['message'] . ' .</p><hr>';




}