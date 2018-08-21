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

var_dump($_POST); // ou bien print_r($_POST)








?>

<!--1. Formulaire de saisie des messages -->
<h1>Votre message</h1>

<form action="" method="post">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br>

    <label for="message">Message</label><br>
    <textarea name="message" id="message" cols="30" rows="10"></textarea><br>

    <input type="submit" name ="envoi" value ="envoyer">
</form>
