<?php
require_once '../inc/init.inc.php';

// 1- On vérifie si membre est admin :

    if(!internauteEstConnecteEtAdmin()){
        header('location:../connexion.php'); // si pas admin, on le redirige vers la page de connexion
        exit();
    }
// debug ($_POST);
if (!empty($_POST)) {
    debug ($_POST);
    $photo_bdd ='';
    if (!empty($_FILES['photo']['name'])){// 'il y a un nom de fichier dans la superglobale $_FILES, c'est que je suis en train d'uploader un fichier
        $nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name']; // Pour créer un nom de fichier unique, on concatène la référence du produit avec le nom du fichier en cours d'upload

        $photo_bdd = 'photo/'. $nom_photo; // chemin relatif de la photo enregistré dans la BDD correspondant au fichier physique uploadé dans le dossier /photo/ du site 
        copy($_FILES['photo']['tmp_name'], '../' .$photo_bdd); // on enregistre le fichier photo qui est temporairement dans $_FILES['photo]['tmp_name] dans le répértoire "../photo/nom_photo.jpg"

    }
    $resultat = executeRequete("UPDATE produit SET reference = :reference, categorie= :categorie, titre= :titre, description = :description, couleur= :couleur, 
    taille = :taille, public= :public, photo = :photo, prix = :prix, stock = :stock   WHERE id_produit = :id_produit", array(':id_produit' => $_POST['id_produit'],
                                                                                      ':reference' => $_POST['reference'],
                                                                                      ':categorie' => $_POST['categorie'],
                                                                                      ':titre' => $_POST['titre'],
                                                                                      ':description' => $_POST['description'],
                                                                                      ':couleur' => $_POST['couleur'],
                                                                                      ':taille' => $_POST['taille'],
                                                                                      ':public' => $_POST['public'],
                                                                                      ':photo'   => $photo_bdd, 
                                                                                      ':prix' => $_POST['prix'],
                                                                                      ':stock' => $_POST['stock']
                                                                                        ));
    
    if ($resultat -> rowCount() == 1) { // si j'ai une ligne dans $resultat, j'ai supprimé un produit
    $contenu .= '<div class="bg-primary">Le produit à bien été Modifier</div>';
    } else {
        $contenu .= '<div class="bg-danger">Erreur lors de la Modification</div>';
    }
}
// 2 - Affichage des produits dans le back-office :
// Exercice : afficher tous les produits sous forme de table HTML que vous stockez dans la variable $contenu. Tous les champs doivent être affichés. Pour la photo afficher une image (de 90px de côté)
$resultat = $pdo->query("SELECT * FROM produit");

$contenu .= '<table class="table" border="1">';
    $contenu .= '<thead class="thead-dark">';
        $contenu .= '<tr>';
            $contenu .= '<th>id produit</th>';
            $contenu .= '<th>référence</th>';
            $contenu .= '<th>catégorie</th>';
            $contenu .= '<th>titre</th>';
            $contenu .= '<th>description</th>';
            $contenu .= '<th>couleur</th>';
            $contenu .= '<th>taille</th>';
            $contenu .= '<th>public</th>';
            $contenu .= '<th>photo</th>';
            $contenu .= '<th>prix</th>';
            $contenu .= '<th>stock</th>';
            $contenu .= '<th>action</th>';
        $contenu .= '</tr>';
    $contenu .= '</thead>';
     // Affichage des autres lignes :
    
     while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // debug($ligne);
        $contenu .= '<form method="post" enctype="multipart/form-data">' ;
            $contenu .= '<tr>';
        // affichage des informations de chaque ligne $ligne :
            foreach($ligne as $indice => $valeur){
                if($indice == 'photo') {
                    $contenu .= '<td><input type="file" name="' . $valeur . '" id="' . $valeur . '"> <img src="../photo/' . $valeur . '" width="90" alt"' . $ligne['titre'] . '"></td>';
                    } else {
            $contenu .= '<td><input type ="text" id ="' . $indice . '" name="' .$indice. '" value="' . $valeur . '"></td>';
            }

        }
            $contenu .= '<td><input type="submit" id="'.$ligne['id_produit'] .'" value="modification"  onclick="return(confirm(\'Etes-vous certain de vouloir modifier ce produit ? \' ))" ></td>';  // $ligne['id_produit'] contien l'id de chaque produit à chaque tour de boucle while : ainsi le lien est dynamique, l'id passé en GET change selon le produit sur lequel je clique
            $contenu .= '</tr>';
        $contenu .= '</form>';
    }
  
$contenu.= '</table>';













//------------------------AFFICHAGE---------------------------

require_once '../inc/haut.inc.php';
?>

    <h1 class="mt-4">Gestion boutique</h1>

    <ul class="nav nav-tabs">
    
        <li><a class= "nav-link active" href="gestion_boutique.php">Affichage de produits</a></li>
        <li><a class="nav-link" href="ajout_produit.php">Ajout d'un produit</a></li>
        <li><a class="nav-link" href="modif_produit.php">Modifier un produit</a></li>
    </ul>
<?php
 echo $contenu;
 












require_once '../inc/bas.inc.php';