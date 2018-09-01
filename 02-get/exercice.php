<?php
//  //Exercice  :
// 
//     echo '<br>';
//     echo '<br>';
//     echo '<p class="color">Exercice sur $_GET :<p>';
//     echo '<p>1-Vous créez une page "Profil" qui affiche un nom et un prénom :</p>';
//     echo '<p>2-Vous y ajoutez un lien en GET "modifier mon profil" et un second "suprimmer  mon profil":
//             ces liens passent dans l\'url à la page  exercice.php elle-meme que l\'on a cliqué sur le lien "supprimer mon profil". Pensez qu\'il faut un indice et une valeur pour chaque action.
//         3- Si on a cliqué sur le lien "modifier mon profil", c\'est-àdir que vous avez reçu cette info en GET, vous affichez le message "Vous avez demandé la modification de votre profil",
//         et si c'est la suppression qui est demandée, vous affichez le message "Vous avez demandé la suppression de votre profil"
//   </p>';



// var_dump ($_GET);
// if (isset($_GET['nom']) && isset($_GET['prenom'])){
//     echo '<p> nom :' . $_GET['nom'] . '</p>';
//     echo '<p> prenom :' . $_GET['prenom'] . '</p>';
   
// } else {
//     echo '<p> Aucun profil sélectionné....</p>';
// }
$message = '';// variable pour contenir les messages pour l'internaute
if  (isset($_GET['action']) && $_GET['action'] == 'modifier' ){// Il fau vérifier d'abord l'existance de l'indice "action" dans $_GET avant d'en vérifier la valeur
    
    $message = '<p>Vous avez demander la modificationde votre profil</p>';
   
} 

if (isset($_GET['action']) && $_GET['action'] == 'supprimer' ){
    
    $message = '<p>Vous avez demander la suppression de votre profil</p>';
   
} 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
</head>
<body>
<h1>PROFIL</h1>
<?php echo $message;?>
<P>Non : Yessad</P>
<P>Prénom : Mohamed</P>
<a href="?nom=yessad&prenom=mohamed">Profil</a>
<a href="?action=modifier">Modifier mon profil</a>
<a href="?action=supprimer">Supprimer mon profil</a>
</body>
</html>

