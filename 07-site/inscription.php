<?php

require_once 'inc/init.inc.php';
$inscription = false; // pour s'avoir si l'internaute vient de s'inscrire (on mettra la variable à true) et ne plus afficher le formulaire d'inscription

var_dump($_POST);

// Traitement du formulaire 
if (!empty($_POST)){ // Si le formulaire est soumis

    // Validation des champs du formulaire
    if (!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20  ) $contenu .= '<div class="bg-danger">Le Pseudo doit contenir entre 4 et 20 caractères.</div>';

    if (!isset($_POST['mdp']) || strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20  ) $contenu .= '<div class="bg-danger">Le Mot de passe doit contenir entre 4 et 20 caractères.</div>';

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 4 || strlen($_POST['nom']) > 20  ) $contenu .= '<div class="bg-danger">Le nom doit contenir entre 4 et 20 caractères.</div>';

    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20  ) $contenu .= '<div class="bg-danger">Le Prénom doit contenir entre 2 et 20 caractères.</div>';

    if (!isset($_POST['ville']) || strlen($_POST['ville']) < 2 || strlen($_POST['ville']) > 20  ) $contenu .= '<div class="bg-danger">La ville doit contenir entre 2 et 20 caractères.</div>';

    if (!isset($_POST['adresse']) || strlen($_POST['adresse']) < 2 || strlen($_POST['adresse']) > 50  ) $contenu .= '<div class="bg-danger">L\'adresse doit contenir entre 2 et 50 caractères.</div>';

    if (!isset($_POST['civilite']) || ($_POST['civilite'] != 'm' && $_POST['civilite'] != 'f') ) $contenu .= '<div class="bg-danger">La civilité est incorecte</div>';

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)  ) $contenu .= '<div class="bg-danger">Email est incorrect.</div>';// filter_var() avec l'argument FILTER_VALIDATE_EMAIL valide que $_POST['email] est bien de format d'un email. Notez que cela marche aussi  pour valider les URL avec FILTER_VALIDATE_URL

    if (!isset($_POST['code_postal']) || !ctype_digit($_POST['code_postal'])  || strlen($_POST['code_postal']) != 5  ) $contenu .= '<div class="bg-danger">Le code postal  est incorrect.</div>'; // la fonction ctype_digit() permet de vérifier qu'un string contient un nombre entier (utilisé pour les formulaires qui ne retournent que des string avec le type "text")

    //-------------------------------
    // Si pas d'erreur sur le formulaire, on vérifie que le pseudo est disponible dans la BDD:

    if (empty($contenu)) { //si $contenu est vide, c'est qu'il n'y a pas d'erreur

        // Vérification du pseudo :
            $membre = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo", array(':pseudo' => $_POST['pseudo'])); // on sélectionne en base les éventuels membres dont le pseudo correspond au pseudo donné par l'internaute lors de l'inscription

            // code du if


    }/* (empty($contenu)) */





}/* fin if (!empty($_POST)) */


//--------------------------------AFFICHAGE--------------------------------------
require_once 'inc/haut.inc.php'; // doctype, header, nav
echo $contenu;  // pour afficher les messages à l'internaute
 
?>
    <h1 class = "mt-4">Inscription</h1>
<?php
if (!$inscription) : // (!$inscription) équivaut à ($inscription == false), c'est à dire que nous entrons dans la condition si $inscription vaut false. Syntaxe en if (codition) : .... endif;
    
?>
    <p>Vueillez renseigner le formulaire pour vous inscrire. </p>

    <form method="post" action="">

        <label for="pseudo">Pseudo</label><br>
        <input type="text" name="pseudo" id="pseudo" value=""><br><br>

         <label for="mdp">Mot de passe</label><br>
        <input type="text" name="mdp" id="mdp" value=""><br><br>

        <label for="nom">Nom</label><br>
        <input type="text" name="nom" id="nom" value=""><br><br>

          <label for="prenom">Prénom</label><br>
        <input type="text" name="prenom" id="prenom" value=""><br><br>

          <label for="email">Email</label><br>
        <input type="text" name="email" id="email" value=""><br><br>

        <label>Civilité</label><br>
        <input type="radio" name="civilite"  value="f" checked>Femme
        <input type="radio" name="civilite"  value="m" checked>Homme<br><br>

        <label for="ville">Ville</label><br>
        <input type="text" name="ville" id="ville" value=""><br><br>

         <label for="code_postal">Code Postal</label><br>
        <input type="text" name="code_postal" id="code_postal" value=""><br><br>

          <label for="adresse">Adresse</label><br>
        <textarea  name="adresse" id="adresse" value=""></textarea><br><br>

        <input type="submit" name="inscription" value="s'inscrire" class="btn"><br>

       
        

        
    
    </form>



<?php 
endif;
require_once 'inc/bas.inc.php'; // footer et fermetures des balise