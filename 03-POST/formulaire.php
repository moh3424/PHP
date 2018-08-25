<?php
//-------------
//La superglobal $_POST
//-------------
//$_POST est une superglobale qui permet de récupérer les données saisies dans un formulaire.
//$_POST étant une supetglobale, il s'agit d'un ARRAY, et il est disponible dans tous les contextes du script, y compris au sein des fonctions (sans faire global $_POST).

// L'array $_POST se remplit de la manière suivante : les names du formulaire constituent les indices de $_POST, et les données saisies dans le formulaires constituent les valeurs de $_POST.
var_dump($_POST);
$message ='';
if (!empty($_POST)){// si $_POST n'est pas vide, c'est qu'il est rempli par des internautes
    $message = '<p>Prénom :' .$_POST['prenom'] . '</p>';
    $message .= '<p>Description  :' .$_POST['description'] . '</p>';
    // dans un futur proche on vérifiera ici les données reçues avant de les traiter
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulaire</title>
</head>
<body>
<h1>formulaire</h1>
<?php echo $message;?>
<form method="post" action="">
    <div>
        <label for="prenom">Prénom</label><!-- un formulaire est toujours dans des <form> pour fonctionner . method = comment vont circuler les données du navigateur au serveur (ici en post : ) . action = url de destination des données -->
        <input type="text" name="prenom" id ="prenom" value =""><!-- ne pas oublier les names: ils constituent les indices de l'array $_POST qui réceptionne les données -->
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id ="password" name ="password" value="">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    
    <div>
        <input type="submit" name ="validation" value="envoyer">
    </div>
</form>
<!-- Les id des labals ne sont pas indispensables : ils permettent de relier un label à son input grâce au au for de même nom. Ainsi si nous cliquons sur un label, le curseur se positionne dans son input -->
    
</body>
</html>
