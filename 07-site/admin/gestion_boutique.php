<?php
require_once '../inc/init.inc.php';

// 1- On vérifie si membre est admin :

    if(!internauteEstConnecteEtAdmin()){
        header('location:../connexion.php'); // si pas admin, on le redirige vers la page de connexion
        exit();
    }
// debug ($_GET);
if (isset($_GET['id_produit'])) {
    $resultat = executeRequete("DELETE FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));
    
    if ($resultat -> rowCount() == 1) { // si j'ai une ligne dans $resultat, j'ai supprimé un produit
    $contenu .= '<div class="bg-primary">Le produit à bien été supprimé</div>';
    } else {
        $contenu .= '<div class="bg-danger">Erreur lors de la suppression</div>';
    }
}
// 2 - Affichage des produits dans le back-office :
// Exercice : afficher tous les produits sous forme de table HTML que vous stockez dans la variable $contenu. Tous les champs doivent être affichés. Pour la photo afficher une image (de 90px de côté)
$resultat = $pdo->query("SELECT * FROM produit");
$contenu .= '<table class= "table table-hover"  border="1">';
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
            $contenu .= '<tr>';
        // affichage des informations de chaque ligne $ligne :
            foreach($ligne as $indice => $valeur){
                if($indice == 'photo') {
                    $contenu .= '<td> <img src="../photo/' . $valeur . '" width="90" alt"' . $ligne['titre'] . '"></td>';
                    } else {
            $contenu .= '<td><input   name="' . $valeur . '" value="' . $valeur . '"></td>';
            }
        }
            $contenu .= '<td><a href="?id_produit='. $ligne['id_produit'] .'"  onclick="return(confirm(\'Etes-vous certain de vouloir supprimer ce produit ? \' ))" >Supprimer</a></td>';  // $ligne['id_produit'] contien l'id de chaque produit à chaque tour de boucle while : ainsi le lien est dynamique, l'id passé en GET change selon le produit sur lequel je clique
            $contenu .= '</tr>';
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