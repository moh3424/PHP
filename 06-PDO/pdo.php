<?php

//-----------------
//      PDO
//----------------

//PDO pour PHP data Objects est une extension de PHP qui définit une interface pour accéder à une base de données depuis PHP (Via du SQL).

function debug($param){
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}


//---------------------------------
// 01- Connexion à la BDO
//----------------------------
echo'<h3> 01- connexion à la BDO </h3>';

$pdo = new PDO ('mysql:host=localhost;dbname=entreprise', // driver mysql : serveur; nom de la PDD
                'root',// pseudo de la BDD
                '', // Mot de passe de la BDD
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// option1 : pour affichez les erreurs SQL
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') // option 2 : définit le jeu de caractères des échanges avec la BDD
                );

// $pdo est un objet de la classe prédéfinie PDO. Il représente la connextion à la BDD.
//------------------------------------------
// 02- exec() avec INSERT, DELET et UPDATE
//------------------------------------------
echo'<h3>  02- exec() avec INSERT, DELET et UPDATE </h3>';

// Notre première requête SQL :
$resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire)
                         VALUES ('test','test','m','test','2016-02-08', 500)");


// exec() est utilisée pour la formation de requête ne retournant pas de jeu de resultat : INSERT, DELETE et UPDATE.

/*Valeur de retour (dans $resultat):
                -en cas de succès  : 1 ou plus, qui correspond au nombre de lignes affectées par la requête
                -en cas d'echec   :  false

*/

echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
echo ' Dernier id généré après la reqête :' . $pdo->lastInsertId() . '<br>'; // méthode qui permet de récupérer depuis la BDD le dérnier id inséré par la requête précédente

$resultat = $pdo->exec("DELETE FROM employes WHERE prenom = 'test'");
echo "<br> Nombre d'enregistrements affectés par le DELETE : $resultat";

//------------------------------------------
// 03- query() avec SELECT et fetch() avec 1 seul résultat 
//------------------------------------------
echo'<h3>  03- query() avec SELECT et fetch() avec 1seul résultat </h3>';

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");

//Au contraire de exec(), query() est utilisé pour les requêtes qui retournent un ou plusieurs résultats provennant de la BDD :  SELECT. Notez que query() peut être aussi utilise utiliséavec INSERT, UPDATE ou DELETE.

/* Valeurs de retours :
                -en cas de succès : nouvel objet issu de la classe prédéfinie PDOStatement
                -en cas d'échec  : false

*/

debug($result);

//$result est le resultat de la requête sur une forme inexploitable directement : il faut donc le transformer avec la méthode fetch() :
$employe = $result->fetch(PDO::FETCH_ASSOC);// la méthode fetch() avec son paramètre PDO::FETCH_ASSOC permet de transformer l'objet $result en ARRAY ASSOCIATIF axploitable (ici $emloye) indexé avec le nom des champs de la table

debug($employe);// por voir l'array associatif

echo 'Je suis ' . ' ' . $employe['prenom'] . ' ' .$employe['nom'] . ' du service ' . ' ' . $employe['service'] . '<br>';

//--------------
// Les trois autres méthodes de fetch() :

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch(PDO::FETCH_NUM); // transforme $result en array indexé numériquement

debug($employe);
print $employe[1] .'<br>';

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");

$employe = $result->fetch();// sans paramètres fetch( mélangearray associatif et array numérique)

debug($employe);
echo $employe['prenom'] . '<br>'; //ou encor
echo $employe[1] . '<br>';

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $result->fetch(PDO::FETCH_OBJ);// transforme en un objet avec les noms des champs de la table comme propriétés de cet objet
debug($employe);
echo $employe->prenom . '<br>';

//Attention : après une requête, il faut choisir l'un des fetch OU après un requête, il faut choisir l'un des fetch(). Si l'on veut en refaire un, il faut refaire la requête : en effet, on ne peut pas effectuer plusieurs transformation successives sur le même objet $result.

//-------------
// Exercece :afficher le service de l'employé dont l'id_employe est 417 (productio).

// Rappel :

//1- Connection à la base de données BBD
//2- Requête SQL
//3- fetch()
//4-echo

//-----------------
//     Resultat
//-----------------
//----------------------------------------
//  id    prenom   nom    .....   salaire
//  405   DANIEL   CHEVEL .....	  1700
//---------------------------------------
//---------------------------
$result = $pdo->query('SELECT service FROM employes WHERE id_employes = 417');
debug($result);

$employe = $result->fetch(PDO::FETCH_ASSOC);// on transforme l'objet $result (qui n'est pas explotable directement)en un array associatif avec pour indice le nom du champ du SELECT (ici service)
debug($employe); // on voit ici le contenu de l'array associatif
echo $employe['service'] . '<br>';

// Si la requête retourne un seul resultat => pas de boucle. Si elle peut pontentiellement en retourner plusieurs => boucle avec WHILE


//----------------------------------------------------------
// 04- fetch() avec boucle while (plusieurs résultats)
//----------------------------------------------------------

echo '<h3> 04- fetch() avec boucle while (plusieurs résultats) </h3>';

$resultat = $pdo-> query ('SELECT * FROM employes'); // cette requête retourne plusieurs résultats, on fait donc une boucle pour les parcourir


echo 'Nombre d\'employés : ' . $resultat->rowCount() . '<br>'; // permet de compter le nombre de lignes retournées par SELECT (exemples : nombre de produits sélectionnés dans une boutique)

// Comme nous avons plusieurs lignes de résultats, nous devons faire une boucle while :$

while ($employe = $resultat->fetch(PDO::FETCH_ASSOC)){ // fetch retourne la ligne SUIVANTE du jeu résultats en array associatif. la boucle while permet de faire avancer le curseur dans le jeu résultat et s'arrête quand le curseur est arrivé à la fin
	//debug($employe); // $employe est une array associatif qui contient les données d'un seul employé à chaque tour de boucle

	echo '<div>';
		echo $employe['prenom'] . '<br>';
		echo $employe['nom'] . '<br>';
		echo $employe['service'] . '<br>';
	echo '...........<div>';
}

// Attention : il n'y a pas UN array avec tous les enregistrements dedants, mais un array par enregitrement, un array par employé

//-----------------------
// 05- Exercice
//-----------------------

echo '<h3> 05- Exercice</h3>';

//Afficher la liste des différents service dans une liste <ul><li>
echo '<p> Afficher la liste des différents service dans une liste <ul><li></p>';


//---------------------
// Première méthode
//-----------------
echo '<h5>  Première méthode : DISTINCT</h5>';

$results = $pdo->query("SELECT DISTINCT service FROM employes");
echo '<ul>';
while ($employe = $results->fetch(PDO::FETCH_ASSOC)){ 
	//debug($employe);
		echo '<li>' . $employe['service'] . '</li>';	
}
echo '...........<ul>';


// Deuxième méthode
echo '<h5>   Deuxième méthode : GROUPE BY </h5><p>GROUPE BY est utilisé pour les fonctions d\'agrégats(qui assemblent des éléments) comme SUM(), COUNT(), MIN(), MAX et AVG()</p>';

//GROUPE BY : est utilisé pour les fonctions d\'agrégats (qui assemblent des éléments) comme SUM(), COUNT(), MIN(), MAX et AVG()
$results = $pdo->query("SELECT * FROM employes GROUP BY service");
echo '<ul>';
while ($employe = $results->fetch(PDO::FETCH_ASSOC)){ 
	//debug($employe);
		echo '<li>' . $employe['service'] . '</li>';	
}
echo '...........<ul>';

echo '<br><br>';
//-------------------
// 06- fetchAll() 
//-------------------
echo '<h3>  06- fetchAll() </h3>';

$resultat = $pdo-> query ('SELECT * FROM employes');

$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);// Retourne <TOUTES les lignes de résultats dans un tableau multidimensionnel (sans faire de boucle): nous avons 1 array associatif par employé à chaque indice numérique.

debug($donnees);// array mutidimensionnel

// Pour afficher son contenu, on fait une boucle foreach:
	echo '<hr>';
	foreach($donnees as $employe){
		debug($employe);// Correspond aux sous arrays qui représente 1 employé à chaque tour de boucle

		echo "<div>
				<p> $employe[prenom] . </p>
				<p> $employe[nom] . </p>
				<p> $employe[salaire] euros </p>
			 </div><hr>";
	}
	//Si nous avions voulu afficher TOUTES  les infos de façon dynamique, nous aurions fait 2 foreach  imbriquées l'une dans l'autre.

	//-------------------
// 07- Table HTML
//-------------------
echo '<h3> 07- Table HTML </h3>';

//On peut afficher dynamiquement les résultats de la requête sous de table HTML.
echo '<p> On peut afficher dynamiquement les résultats de la requête sous de table HTML.</p>';

$resultat = $pdo->query("SELECT id_employes, prenom, nom, service, salaire FROM employes ORDER BY salaire DESC");// de plus grand salaire au plus petit salaire

echo '<table border="1">';
// La ligne d'entêtes :
echo '<p> La ligne d\'entêtes :</p>';
	echo '<tr>';
		echo '<th>id employés</th>';
		echo '<th>prénom</th>';
		echo '<th>nom</th>';
		echo '<th>service</th>';
		echo '<th>salaire</th>';
	echo '</tr>';
	echo '<p> Affichage des autres lignes :</p>';
	// Affichage des autres lignes :

	while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
		echo '<tr>';
			// Affichage des infos de chaque ligne $ligne :
			foreach($ligne as $info){
				echo "<td>$info</td>";
				//Ou bien  // echo '<td>' . $info . '</td>';

			}
		echo '</tr>';
	}
echo '</table>';

//-------------------
// 08- Requête préparée et bindParam()
//-------------------
echo '<h3> 08- Requête préparée et bindParam() : </h3>';

$nom = 'sennard';

// 1- Préparer la requête :
echo '<h4> 1- Préparer la requête :</h4>';
echo '<p> avec la methode prepare() .</p>';

$resultat =$pdo->prepare("SELECT * FROM employes WHERE nom= :nom"); // :nom est un marqueur nominatif qui attend qu'on lui donne une valeur

// 2- Lier les marqueur au valeurs :
echo '<h4> 2- Lier les marqueur au valeurs :</h4>';
echo '<p> avec la methode bindParam() et on utilisant le marqueur :nom .</p>';

$resultat->bindParam(':nom' , $nom);

// 3- Executer la requête :
echo '<h4> 3- Executer la requête :</h4>';
echo '<p> avec la methode execute() .</p>';

$resultat->execute();

// 4- Affichage :
echo '<h4> 4- Affichage :</h4>';

$donnes = $resultat->fetch(PDO::FETCH_ASSOC);
debug($donnes);