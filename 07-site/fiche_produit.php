<?php

require_once 'inc/init.inc.php';

// Variable d'affichage :
$panier = '';
$suggestion ='';

// 1- On vérifie que le produit demandé existe bien (un produit en favori a pu être supprimé de la BDD ...):
    if (isset($_GET['id_produit'])){// Si existe "id_produit" dans $_GET (donc dans l'url), c'est qu'un produit a été demandé

        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit'])); // On sélectionne le produit demandé dans  l'url par son id


        if ($resultat->rowCount() == 0){//  S'il n'ya pas de ligne dans $resultat, le produit demandé n'est pas en BDD : on redirige vers la boutique
            header('location:boutique.php');
            exit();
        }
        // Si on passe ici, le produit existe en BDD:
        $produit = $resultat->fetch(PDO::FETCH_ASSOC);// On transforme l'objet $resultat en un array associatif $produit, sans boucle while car on est certain de n'avoir qu'un seul produit
        // debug($produit);
        extract($produit);// On extrait tous les indices sous forme de variables. Exemple $produit['titre] devient une variable $titre dont la valeur est produit['titre]


        // -2 Affichage du formulaire d'ajout au panier si le stock est positif :
            if ($stock > 0){
                // Si j'ai du stock sur mon produit, on affiche le bouton d'ajout au panier

               $panier .= '<form method="post" action="panier.php">';
                    $panier .= '<input type="hidden" name="id_produit" value="'. $id_produit .'">';// champ caché qui permet de récupérer dans $_post la valeur de id du produit ajouté

                    // Sélecteur pour sélectionner la quantité :
                    $panier .= '<select name"quantite" class="custom-select col-sm-2">';
                        for ($i =1; $i <= $stock && $i <= 5; $i++){
                            $panier .= "<option> $i </option>";
                        }
                    $panier .= '</select>';

                    // Bouton d'ajout au panier :
                    $panier .= '<input type="submit" name"ajout_panier" value="ajouter au panier" class="btn col-sm8 ml-2">';
               $panier .='</form>';
               $panier .= '<p><i>Nombre de produits disponible : ' . $stock .'</i></p>';

            }else {
                $panier .= '<p>Rupture de stock</p>';
            }


    }else {
        // On redirige l'internaute vers la boutique car aucun produit n'a été sélectionné :
        header('location:boutique.php');
        exit();

    }/* fin if (isset($_GET['id_produit'])) */







//--------------------------------AFFICHAGE--------------------------------------
require_once 'inc/haut.inc.php'; // doctype, header, nav
?>
<div class="row">
    <div class="col-lg-12">
        <h1><?php echo $titre; ?></h1>
    </div>

    <div class="col-md-8">
        <img class="img-fluid" src="<?php echo $photo;?>" alt="<?php  echo $titre;?>">
    </div><!-- col-md-8 -->

    <div class="col-md-4">
        <h3>Déscription</h3>
        <p><?php echo $description; ?></p>
        <h3>Détails</h3>
        <ul>
            <li>Catégorie : <?php echo $categorie; ?></li>
            <li>Couleur : <?php echo $couleur; ?></li>
            <li>Taille : <?php echo $taille;?></li>
        </ul>
        <h4>Prix : <?php echo $prix;?>Euros</h4>
        <?php echo $panier; ?>
        <a href="boutique.php?categorie=<?php echo $categorie;?>">Retour vers votre sélection</a>

    </div><!--  col-md-4 -->

</div><!-- row -->





<?php














require_once 'inc/bas.inc.php'; // footer et fermetures des balise