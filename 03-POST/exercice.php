<?php 
// Exercice :

/*
    -Créer un formulaire avec les champs ville et  postal, et une zone de texte adress.
    -Vous envoyez  les données saisies par l'internautes dans exercice-traitement.php. 
    Vous y affichez ces saisies en précisant l'étiqutte correspondante.
*/




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercice</title>
</head>
<body>

<h1>Exercice sur le formulaire</h1>
<?php echo $message ?>

<form method = "post" action = "exercice-traitement.php">
    <div>
        <label for="ville">Ville :</label>
        <input type="text" name="ville" id="ville" value="">
    </div>  
    <div>
        <label for="code-p">Code Postal :</label>
        <input type="text" name="code-p" id="code-p" value="">
    </div> 
    <div>
        <label for="zonetext"></label>
        <textarea name="zonetext" id="zonetext" cols="30" rows="10">Commentaire</textarea>
    </div>
    <div>
        <input type="submit" name="validation" value="envoyer">
    </div> 
</form>

</body>
</html>