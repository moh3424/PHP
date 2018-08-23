<?php

require_once 'inc/init.inc.php';

debug($_POST);

// 1- Traitement du formulaire
if (!empty($_POST)){ // Si le formulaire est soumis

    // Validation des champs du formulaire
    if (!isset($_POST['pseudo']) || empty($_POST['pseudo']) ) $contenu .= '<div class="bg-danger">Le Pseudo est requis.</div>';

    if (!isset($_POST['mdp']) || empty($_POST['mdp']) ) $contenu .= '<div class="bg-danger">Le Mot est requis.</div>';

     //-------------------------------
    // Si pas d'erreur sur le formulaire, on vérifie que le pseudo est disponible dans la BDD:

    if (empty($contenu)) { //si $contenu est vide, c'est qu'il n'y a pas d'erreur
        $membre = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp",array(':pseudo'=> $_POST['pseudo'], ':mdp'=> $_POST['mdp']) );

        if ($membre->rowCount() > 0){// si le nombre de ligne est supérieur à 0, alors le login et le mdp existent ensemble en BDD
            // On crée une session avec les informations du membre:
                $informations =$membre->fetch(PDO::FETCH_ASSOC);// On fait in fetch pour transformer l'objet $membre en un array associatif qui contien en indices le nom de toutes les champs de la requête
                debug($informations);
                $_SESSION['membre'] = $informations;// Nous créons une session avec les infos du membre qui proviennent de la BDD
                header('location:profil.php');
                exit();// en redirige l'internaute vers la page de son profil, et on quitte ce script avec la fonction exit()

        }else {// sinon c'est qu'il y a erreur sur les identifiants 
            $contenu .= '<div class="bg-danger">Erreur sur les identifiants</div>';

        }/* fin de if ($membre->rowCount() > 0) */

    }/* fin  if (empty($contenu)) */
}// fin de if (!empty($_POST))



// ----------------------AFFICHAGE----------------------------
require_once 'inc/haut.inc.php';
?>
 <h1 class="mt-4">Connexion</h1>
 <?php echo $contenu; ?>

 <form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" id="pseudo" value=""><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" name="mdp" id="mdp" value=""><br><br>

    <input type="submit" name="inscription" value="se connecter" class="btn"><br>
 
 </form>



<?php

require_once 'inc/bas.inc.php';