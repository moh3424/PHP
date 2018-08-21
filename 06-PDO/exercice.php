<?php


echo '<h1>Les commerciaux et leur salaire</h1>';


/**
 * Exercice :
 * 
 * -Afficher dans une liste ul li le prenom, le nom et le salaire des employés appartenant au service comercial (un <li> par commercial), en utilisant une requête préparée.
 * - Afficher le nombre de commerciaux
 * 
 * 
 */


echo'<h3> Exercice</h3>';

$pdo = new PDO ('mysql:host=localhost;dbname=entreprise', // driver mysql : serveur; nom de la PDD
                'root',// pseudo de la BDD
                '', // Mot de passe de la BDD
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// option1 : pour affichez les erreurs SQL
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') // option 2 : définit le jeu de caractères des échanges avec la BDD
                );

$service = 'commercial';
$resultat =$pdo->prepare("SELECT prenom, nom, salaire FROM employes WHERE service= :service");
$resultat->bindParam(':service' , $service);
$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
function debug($param){
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
};
echo '<br><br>';
debug($donnees);
//-Afficher dans une liste ul li le prenom, le nom et le salaire des employés appartenant au service commercial (un <li> par commercial), en utilisant une requête préparée.
echo '<h4>Afficher dans une liste ul li le prenom, le nom et le salaire des employés appartenant au service commercial (un li par commercial), en utilisant une requête préparée.</h4>';
echo '<ul>';
while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){ 
	//debug($employe);
        echo '<li>' . $donnees['prenom'] . '</li>';	
        echo '<li>' . $donnees['nom'] . '</li>';
        echo '<li>' . $donnees['salaire'] . '</li>';
}
echo '...........</ul>';


echo '<br><br>';
//Afficher dynamiquement les résultats de la requête sous de table HTML.
echo '<h4>Afficher dynamiquement les résultats de la requête sous de table HTML.</h4>';
echo '<br>';
// Première méthode :
echo '<h4> Première méthode :</h4>';
$resultat->execute();// toujours exécuter 
echo '<table border="1">';
// La ligne d'entêtes :
echo '<p> La ligne d\'entêtes :</p>';
	echo '<tr>';
		echo '<th>prenom</th>';
		echo '<th>nom</th>';
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

echo '<br><br>';

// Dexième méthode :
echo '<h4> Dexième méthode :</h4>';
$resultat->execute();// toujours exécuter 
echo '<p> La ligne d\'entêtes :</p>';
echo '<table border="1">';
	echo '<tr>';
		echo '<th>prenom</th>';
		echo '<th>nom</th>';
		echo '<th>salaire</th>';
	echo '</tr>';
	echo '<p> Affichage des autres lignes :</p>';
	// Affichage des autres lignes :
   
	while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
		echo '<tr>';
			// Affichage des infos de chaque ligne $ligne :
                echo '<td>'. $ligne['prenom'] .'</td>';
                echo '<td>'. $ligne['nom'] .'</td>';
                echo '<td>'. $ligne['salaire'] .' euro</td>';
				//Ou bien  // echo '<td>' . $info . '</td>';
		echo '</tr>';
	}
echo '</table>';

echo '<br><br>';


//* - Afficher le nombre de commerciaux
echo '<h4>Le nombre de commerciaux</h4>';
echo 'Nombre d\'employés : ' . $resultat->rowCount() . '<br>';
echo date('y/m/d') .' '.date("l");

setlocale(LC_TIME, 'fr_FR');
echo strftime("%A %d %B %Y");