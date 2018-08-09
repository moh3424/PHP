<?php
// var_dump($_POST); ce code pour aidé le devloppeur a se repéré
$message = '';
if (!empty($_POST)){// est équivalent à if($_POST : signifie que $_POST n'est pas vide, donc que le formulaire a été soumis)
    $message = '<p>Ville :' .$_POST['ville'] . '</p>';
    $message .= '<p>Code Postal  :' .$_POST['code-p'] . '</p>';
    $message .= '<p>Zone de Text :' .$_POST['zonetext'] . '</p>';
    $message .= '<p>Votre formulaire à été bien envoyer</p>';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Votre formulaire </title>
</head>
<body>
<h1>Vous avez indiqué :</h1>
<?php  echo $message; ?>
</body>
</html>