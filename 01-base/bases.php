<style>
    h2{font-size: 20px; color: orange; text-align:center;}
  
    .vert{
        background: green;
    }
    .jaune{
        background: yellow;
    }
    .bleu{
        background: blue;
    }
    .bleuT{
        color: blue;
    }
    .rouge{
        background: red;
    }
    .green{
        color: green;
    }
    .largeur{
        width: 400px;
        background: #87ceeb;
    }
    .largeurT{
        width: 20px;
        background: #87ceeb;
    }

    .violet{
        color: olive;
        text-decoration: underline;
    }
    .color{
        color: blue;
        text-decoration: underline;
    }

   
</style>

<?php
//---------------------
echo'<div><h2> les bases</h2></div>';
//--------------------
?>

<?php
//pour ouvrir un passage en PHP, on utilise la balise précédente
//pour fermer un passage en pHP, on utilise la balise suivante:
?>

<p>Bonjour</p>  <!-- en dehors des balises d'ouverture et la fermeture de PHP, nous pouvons écrir du HTML -->

<?php
// vous n'êtes pas obligé de fermer un passage en PHP en fin de  script.

//----------------------------------------------
echo'<div><h2> Affichage dans le navigateur</h2></div>';
//---------------------------------------------
// echo est une instriction qui permet d'afficher  dans le navigateur. Notez que nous pouvons y mettre du HTML.
// Toutes les instrictions se terminenent  par un ";".

print '<div>Nous sommes lundi <div>'; //  autre instruction  d'affichage

//Deux autres intruction d'affichage existe (nous les verrons plus loin):
print_r('message');
echo '<br>';
var_dump('message');

//pour faire un commentair sur une seul ligne

/*
pour faire un commentaire
sur plusieurs ligne
*/
echo '<hr>';

//-------------------------------------------------------------
echo'<h2> Variable : déclaration, affectation et type</h2>';
//------------------------------------------------------------

// Une variable est un espace memoir permetant de conserver une valeur.

//En PHP, on déclare une variable avec le signe $.

$a = 127; // on déclare la variable !a et lui affect la valeur 127, sans oublier le point vérgul"".
echo gettype($a); // gettype() est une fonction prédéfinie qui retourne le type d'une variable. Ici un integer (entier)
echo '<br>';

$a = "Une chaine de caractère";
echo gettype($a); // gettype() est une fonction prédéfinie qui retourne le type d'une variable. Ici un string (chaine de caractère)
echo '<br>';

$b = '127';
echo gettype($b); // un nombre écrit entre quotes ou guillemets est interprété comme un string
echo '<br>';

$a = true; // true ou bien false
echo gettype($a); // boolean
echo '<br>';

//par convention, un nom de variable commence par une miniscule, puis on met une majuscule à chaque mot. Il peut contenir des chiffres (jamais au début), ou un "_" (pas au début car signification particulière en objet ni a la fin)
echo '<hr>';
//-------------------------------------------------------------
echo'<h2> Concaténation</h2>';
//------------------------------------------------------------

// En PHP on concatène avec le symbole "." qui peut se traduire par "suivi de".

$x = 'Bonjour ';
$y = 'Tout le monde';

echo $x . $y . '<br>';// par convention on met les espaces entre les point '.' de la concaténation // affiche "Bonjour tout le monde"
echo $x , $y , '<br>';// sa fonctionne uniquement avec echo // on peut séparer les arguments à afficher dans echo par une ",". Attention, ne fonctionne pas avec print. de préférence d'oublier cette syntaxe
echo '<hr>';
//-------------------------------------------------------------
echo'<h2> Concaténation lors de l\'affectation</h2>';
//------------------------------------------------------------

$prenom1 = 'Bruno ';
$prenom1 = 'Claire';
echo $prenom1 .  '<br>';// Dans ce cas il affiche Claire car la dexième affectation écraseta la première

$prenom1 = 'Bruno et';
$prenom1 .= ' Claire';// l'opérateur .= permet d'ajouter la valeur "Claire" à la valeur "Bruno et" contenue dans $prenom1 sans l'écraser. affiche donc "Bruno et Claire"
echo $prenom1 .  '<br>'; // dans ce cas il affiche Bruno et Claire
echo '<hr>';
//-------------------------------------------------------------
echo'<h2> Guillemets et quotes </h2>';
//------------------------------------------------------------

$message = "aujourd'hui";
$message = 'aujourd\'hui'; // on échape les apostrophes dans les quotes simples (AltGr + 8)

// --------------
$txt = 'Bonjour';
echo "$txt tout le monde <br>";// dans des guillemet la variable est évaluée: c'est son contenu qui est affiché
echo '$txt tout le monde <br>';// dans des quotes simple, le nom de la variable est traité commme du texte brut
echo '<hr>';
//-------------------------------------------------------------
echo'<h2> Constante </h2>';
//------------------------------------------------------------
//Une constante permet de conserver une valeur sauf que celle-ci ne pourra pas être modifiée durant l'exécution du ou des scripts. Utile par exemple pour conserver les paramètres de connexion à la BDD afin de ne pas pouvoir les altérer

define('CAPITALE', 'Paris');// déclare la constante appelée CAPITALE et lui affecte la valeur 'Paris'. PAr convention, les constantes s'écrivent en majuscules.

echo CAPITALE . '<br>'; // affiche Paris

echo '<hr>';
//-------------------------------------------------------------
echo'<h2> Les opérateurs arithmétiques </h2>';
//------------------------------------------------------------

$a = 10;
$b = 2;

echo $a + $b . '<br>';// affiche 12
echo $a - $b . '<br>';// affiche 8
echo $a * $b . '<br>';// affiche 20
echo $a / $b . '<br>';// affiche 5
echo $a % $b . '<br>';// affiche 0

//------
//Opération et affectation combinées :

$a = 10;
$b = 2;

$a += $b; // éqivaut $a = $a + $b, $a vaut donc au final 12
$a -= $b; // éqivaut $a = $a + $b, $a vaut donc au final 10

//Il existe aussi les opérateurs *=, /= et %=

//--------------
// Incrémenter et décrémenter :
$i = 0;
$i++;// incrémentation : on ajoute +1 à $i
$i--;// décrémentation : on retranche 1 à $i

echo '<hr>';
//------------------------------------------------
echo'<h2> Structures Conditionnelles </h2>';
//------------------------------------------------

// if.....else

$a = 10;
$b = 5;
$c = 2;

if ($a > $b){ // si $a est supérieur à $b, la condition est évaluée à true, on entre donc dans les accolades qui suivent :
    echo '$a est supérieur à $b <br>';
}else {// sinon, dans le cas contraire, on entre dans le else:
    echo '$a est inférieur à $b <br>';
}

// dexième ecriture

if ($a > $b){ // si $a est supérieur à $b, la condition est évaluée à true, on entre donc dans les accolades qui suivent :
    echo "$a est supérieur à $b <br>";
}else {// sinon, dans le cas contraire, on entre dans le else:
    echo "$a est inférieur à $b <br>";
}

//------
// L'opérateur AND qui s'écrit &&:

if ($a > $b && $b > $c){ // si $a est supérieur à $b ET au même temps $b est supérieur à $c, alors on entre dans les accolades:
    print 'OK pour les deux conditions <br> ';
    // OU
    print "$a est supérieur $c <br>";
}

// -------
// L'opérateur OR  qui s'écrit ||

if ($a == 9 || $b > $c){// si $a est égale (==) à 9 OU $b est supérieur à $c, alors on entre dans les accolades qui suivent :
    echo 'OK pour au moins une  des deux conditions <br>';
}else {
    echo 'les deux conditions sont fausses <br>';
}

//----------
// if .... elseif....else :

if ($a == 8){
    echo 'réponse 1: $a est égal à à 8 <br>';
}elseif ($a != 10){// Notez la syntaxe elseif en un seul mot
    echo 'réponse 2: $a est différent de 10 <br>';
} else {
    echo 'réponse 3 : les deux conditions précédentes sont fausses <br>';
}

// REMARQUE : on ne met pas de "; à la fin des structures conditionnelles.

//------
//L'opérateur OU exclusif qui s'écrit XOR :

$question1 = 'mineur';
$question2 = 'je vote';// exemple d'un questionnaire avec plusieurs réponses possibles

if ($question1 == 'mineur' XOR $question2 == 'je vote') {// avec le OU exclusif seulement l'une des deux conditions doit être valide (soit l'une OU soit l'autre)
    echo 'Vos réponses sont cohérentes <br>';
}else {
    // si les deux conditions sont vraies (cas de "mineur vote), ou si les deux conditions  sont fausses (cas de "majeur ne vote pas), nous entrons dans le else
    echo 'Vos réponsese ne sont pas cohérentes <br>';
}

//----------
// Condition ternaire :
// Syntaxe contractée de la condition if....else

$a = 10;

echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>' ; // dans la ternaire, le "?"  remplace if, et le ":" remplase else. ON affiche le premier string si la condition est vraie, sinon le second.

echo ($a == 10) ? "$a est égal à 10 <br>" : "$a est différent de 10 <br>" ; 

//---Ou encore :
$resultat = ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>' ; 
echo $resultat;

//----------
// Différence entre == et === :

$varA = 1; // Integer
$varB = '1'; // String

if ($varA == $varB){// On compare uniquement en valeur avec l'opérateur ==
    echo '$varA est égal à $varB en valeur <br>';
}

if ($varA === $varB){
    echo '$varA  est égal à $varB en valeur et en type <br>';
}else {
    echo '$varA est différent de $varB en valeur OU en type <br>';
}

// Pour memoir, le simple "=" correspond à une affectation.

//---------
// isset() et empty():
echo '<h3 class ="violet"> isset() et empty():<h3>';
// Définitions :
echo '<h4>Définitions</h4>';
// empty(): teste si c'est vide (c'est-à-dire 0, '', NULL, false ou non défini)
echo '<p class="color">empty(): teste si c\'est vide (c\'est-à-dire 0, \'\', NULL, false ou non défini)</p>';

$var1 = 0;
$var2 = '';

if (empty($var1)){
    echo 'on a 0, vide, NULL , false ou non défini <br>';
}

if (empty($var2)){
    echo '$var2 est défini <br>';
}

// Si on met les lignes 247 et 248  en commentaires, la première condition reste vraie, car $var1 est non définie, et la seconde devient fausse, car $var2 n'existe pas.

// Contexte d'utilisateur : les formulaires pour empty, l'existence de variable ou d'array avec isset avant de les utiliser.

//---------
// L'opérateur NOT qui s'écrit "!":
echo '<h2 class ="violet"> L\'opérateur NOT qui s\'écrit "!":<h2>'; 
$var3 = 'Je ne suis pas vide';

if (!empty($var3)) echo '$var3 n\est pas vide <br>'; //! pour NOT est une négation.Ici signifie si $var3 n'est pas vide

//phpinfo();  // fonction prédéfinie qui affiche des informatios sur le contexte d'exécution du script
echo '<h3 class ="violet"> phpinfo() :<h3>';           
echo '<p class="color"> fonction prédéfinie qui affiche des informatios sur le contexte d\'exécution du script</p>';

echo '<hr>';
//------------------------------------------------
echo'<h2> Condition switch </h2>';
//------------------------------------------------

// la condition switch est une autre syntaxe pour écrire un if....elseif.....elseif......else.

$couleur ="jaune";

switch ($couleur) {
    case 'bleu' : // Si $couleur contien la valeur 'bleu', nous exécutons l'instriction après le ":" qui suit:
        echo 'Vous aimez le bleu  <br>';
    break; //break est obligatoire pour quitter la condition switch une fois le case exécuté
    case 'vert' :
         echo 'Vous aimez le vert  <br>';
    break;
    case 'rouge' :
         echo 'Vous aimez le rouge  <br>';
    break;
    case 'jaune' :
         echo '<h3 class="jaune">Vous aimez le jaune </h3> <br>';
    break;
    case 'blanc' :
         echo 'Vous aimez le blanc  <br>';
    break;
    
    default :// correspond à else, le cas par défaut dans lequel on entre si aucune des valeurs précédentes n'est juste
        echo 'Vous n\'aimez ni le bleu, ni le vert, ni le rouge, ni le jaune, ni le blanc  <br>';
    break;

}

//Exércice : réécrivez le switch précédent  en conditions if .... pour obtenir exactement le même resultat

$couleur = 'bleu';

if ($couleur == 'jaune'){
    echo 'Vous aimez le jaune';
}elseif ($couleur == 'bleu'){
    echo '<h5 class="bleu">Vous aimez le bleu</h5> <br>';
}elseif ($couleur == 'vert'){
    echo 'Vous aimez le vert  <br>';
}elseif ($couleur == 'blanc'){
    echo 'Vous aimez le blanc  <br>';
}else {
    echo 'Vous n\'aimez ni le bleu, ni le vert, ni le rouge, ni le jaune, ni le blanc  <br>';
}

$couleur = 'vert';

if ($couleur == 'jaune'){
    echo 'Vous aimez le jaune';
}elseif ($couleur == 'bleu'){
    echo '<h5 class="bleu">Vous aimez le bleu</h5> <br>';
}elseif ($couleur == 'vert'){
    echo '<h5 class="vert">Vous aimez le vert</h5>  <br>';
}elseif ($couleur == 'blanc'){
    echo 'Vous aimez le blanc  <br>';
}else {
    echo 'Vous n\'aimez ni le bleu, ni le vert, ni le rouge, ni le jaune, ni le blanc  <br>';
}

$couleur = 'rouge';

if ($couleur == 'jaune'){
    echo 'Vous aimez le jaune';
}elseif ($couleur == 'bleu'){
    echo '<h5 class="bleu">Vous aimez le bleu</h5> <br>';
}elseif ($couleur == 'vert'){
    echo '<h5 class="vert">Vous aimez le vert</h5>  <br>';
}elseif ($couleur == 'rouge'){
    echo '<h5 class="rouge">Vous aimez le rouge</h5>  <br>';
}else {
    echo 'Vous n\'aimez ni le bleu, ni le vert, ni le rouge, ni le jaune, ni le blanc  <br>';
}

echo '<hr>';
//------------------------------------------------
echo'<h2>Les Fonctions Prédéfinies </h2>';
//------------------------------------------------
// Une fonction prédéfinie permet de réaliser un traitement spécifique prédéterminé dans le langage PHP

//-----
// strpos() :
echo '<h3 class ="violet"> strpos() :<h3>';
$email1 = 'prenom@site.fr';
echo strpos($email1, '@');// indique la position 6 du caractère '@' dans la chaine $email (compte à partire de 0)

echo '<br>';

$email2 = 'Bonjour';
echo strpos($email2,'@' );// cette ligne n'affiche rien, pourtant la fonction strpos retourne bien quelque chose. Pour l'analyser nous faisons un var_dump ci-dessous:


var_dump(strpos($email2,'@'));// on voit  grâce au var_dump que la fonction retourne false quand elle ne trouve pas l'@. var_dump est une instruction d'affichage améliorée que l'on utilise uniquement en phase de dévlopement (on le retire en production)

echo '<br>';

//--------
// strlen() :
echo '<h3 class ="violet"> strlen()<h3>';
$phrase = 'mettez une phrase ici';
echo strlen($phrase) . '<br>'; // affiche la longueur de la chaine de caractères, ici 21. Notez que strlen compte le nombre d'octets, et que les caractères accentués comptent pour 2. Si vous voulez comptez précisément le nombre de caractères, on utilise: mb_strlen().

//-----
//strtolower, strtoupper(), trim()

echo '<h3 class ="violet"> strtolower, strtoupper(), trim()<h3>';

$message = '     Hello World!';

echo strtolower($message) . '<br>';// affiche tout en miniscules

echo strtoupper($message) . '<br>';// affiche tout en majuscules

echo strlen($message) . '<br>';// affiche la longueur avec les espaces

echo strlen(trim($message)) . '<br>';// trim() supprime les espaces au début et à la fin de la chaine de caractères. Puis strlen affiche la longueur de cette chaine sans les espaces .

//-----------
// die () ou exit();
echo '<h3 class ="violet"> die () ou exit():<h3>';
//exit('ici un message'); // affiche un message (optionnel) et arrête le script
//die('un autre message); // die() est un alias de  exit : il fait la même chose.

//---------------
//Le manuel PHP
echo '<h3 class ="violet"> Le manuel PHP:<h3>';
/*
Pour chercher un fonction (ou une chose) de PHP : faire Google "OHP nom de la fonction.
exemple : "PHP trim"
le site de référence : php.net/manual/fr/
A retenir : l'encadré blanc qui définit la fonction : en bleu les mots clés et les paramètres, en vert leur type, entre crochets les paramètres optionnels.
*/

//-------------------------------------------
echo'<h2>Les Fonctions Utilisateur </h2>';
//-------------------------------------------
//Des fonctions sont des morceaux de codes encapsulés dans des accolades et portant un nom, qu'o, appelle au besoin pour exécuter une action précise.

// Les fonctions qui ne sont pas prédéfinies mais déclarées par le développeur sont appelées fonction utilisateur.

// Fonction sans paramètre :
function tiret(){ //on déclare une fonction avec le mot clé function, suivi du nom puis d'une paire de (), et enfin d'une paire d'accolades
    echo '<hr>';
}
tiret();// pour exécuter une fonction, on l'appelle par son nom suivi d'une paire de ()

//------
// fonction avec paramètre et return :
echo '<h3 class ="violet">fonction avec paramètre et return :<h3>';

function affichageBonjour($nom) {
    return "Bonjour $nom comment vas-tu ?";
    // Ou bien 'bonjour' . $nom . ', comment vas-tu ?';
    echo 'TEST'; // après un return, les instructions de la fonction ne sont pas lues
}

echo affichageBonjour('Luc');// Si la fonction possède un paramètre, il faut obligatoirement lui envoyer une valeur lors de l'appel de la fonction. La fonction nous returne le string "Bonjour Luc, comment vas-tu ? gâce au mot clé return qui s'y trouve. Il faut donc faire un echo pour afficher le résultat.

//Exercice d'pplication
echo '<h3 class ="violet">Exercice d\'pplication :<h3>';
// écrivez une fonction appelée appliqueTva2 qui multiplie un nombre donnée par un taux donné.
echo '<p class="color">Exercice N° : d\'pplication :<p>';

// function appliqueTva($nombre){
//     return $nombre*$taux;
// }

// Votre code :

function appliqueTva2($nombre,$taux = 1.5){// on peut initialiser un paramètre par défaul si on ne reçoit pas de valeur : ici $taux prend la valeur 1.5 par défaut si on lui en donne pas.
    return $nombre*$taux;
}

echo  appliqueTva2(6,3) . '<br>';
echo  appliqueTva2(6) . '<br>'; //$taux ayant une valeur par défaut dans les () de la fonction ci-dssus, on n'est pas obligé de lui donnér un argument pour ce $taux. Affiche 15
tiret();
//--------------
//Exercice N°1 : d\'pplication :
echo '<p class="color">Exercice N° 2 d\'pplication :<p>';

/*Ecrivez la fonction factureEssence() qui calcule le coût total de votre facture en fonction du nombre de litres d'essence que vous lui donnez 
en appelant la fonction. cette fonction retourne la phrase 'votre facture est de X euros pour Y litres d'essence où X et Y sont des variable.
- Pour cela vous avez besoin du prix au litre. On vous donne une fonction prixLitre() qui vous communique ce prix. Utilisez-la donc dans votre fonction factureEssence().
*/

function prixLitre() {
    return rand(100,200)/100;
}

// Mon code:
echo '<p class="color">Mon Code :<p>';

// function factureEssence($Y){
    
//     return 'Votre facture est de : ' . prixLitre()*$Y . ' euros pour :  '  .  $Y . ' littres <br>';
// }
// echo  factureEssence(50);

// Correction:

echo '<p class="color">Correction :<p>';


function factureEssence($littreEssence){
    $prix =  prixLitre()*$littreEssence;
    return 'Votre facture est de : ' . $prix . ' euros pour :  '  .  $littreEssence . ' littres <br>';
}
echo  factureEssence(25);
tiret();
//-------------------------------------------
echo'<h2>Espace local et Espace global :</h2>';
//-------------------------------------------

// De l'espace local à l'espace global :
echo'<h3 class ="violet">Espace local et Espace global :</h3>';
function jourSemaineTest(){
    $jour = 'mardi';
}
//echo $jour; // Ne fonctionne pas car cette variable est locale à la fonction, donc connue et accessible uniquement au sein de cette fonction
function jourSemaine(){
    $jour1 = 'mardi';// variable local
    return $jour1;// return permet de sortir une valeur de la fonction
}
echo  jourSemaine();// on récupère la valeur retournée par le return de la fonction : affiche "mardi"

// De l'espace global à l'espace local  :
echo'<h3 class ="violet">Espace global et Espace local  :</h3>';

$pays = 'France'; // variable globale

function affichePaysTest(){
    echo $pays;
}
//affichePaysTest(); // ne fonctionne pas

function affichePays(){
    global $pays;// le mot clé global permet de récupère une variable globale dans l'espace local de la fonction
    echo $pays;// on accède donc bien a cette variable
}
affichePays(); // pas de echo car est dèjà dans la fonction

//-------------------------------------------
echo'<h2>Les Structures itératives : les boucles :</h2>';
//-------------------------------------------
// Les boucles sont destinées à répéter des liggnes de codes de façon automatique.

//Boucle while :
echo'<h3 class ="violet">Boucle while  :</h3>';
$i = 0; // valeur de départ de la boucle

while ($i < 3){// tant que $i est inférieur à 3, on entre dans dans la boucle
    //ici le code a répéter
    echo "$i----";// affiche "0---1---2---"
    $i++;// on n'oublie pas d'incrémenter pour que la condition d'entrée dans la boucle deviennent fausse à un moment donné (sinon on obtient une boucle infinie)
}

// Note : pas de ";" à la fin du while (=structure)

echo '<br>';

echo '<br>';

echo '<br>';

//Exercice : à l'aide d'une boucle while, afficher dans un sélecteur les années depuis 1918 à 2018.
// Rappel:
// echo '<select>';
//     echo '<option>1</option>';
//     echo '<option>.....</option>';
// echo '</select>';
$i = 1918;
echo '<select class="green largeur">';
while ($i <= 2018){
    echo '<option>' . $i . ' Année' . '</option>';
    $i++;
}
echo '</select>';

echo '<br>';

echo '<br>';

//----------
// Boucle do----while:
echo'<h3 class ="violet">Boucle de----while  :</h3>';
//La boucle do while a la particularité de s'exécuter au moins une fois, puis tant que la condition de fin est vraie.

echo '<p>La boucle do while a la particularité de s\'exécuter au moins une fois, puis tant que la condition de fin est vraie.</p>';

$j = 0;

do {
    echo 'Je fais un tour de boucle avec la boucle do while';
    $j++;
} while ($j > 10); // la condition est évaluée à false tout de suite (1 n'étant pas supérieur à 10), et pour tant la boucle a tourné une fois. Attention au ";" après le while  !
tiret();
//----------
// Boucle for:
// La boucle for est une autre syntaxe de la boucle while dans laquelle les paramètres valeur de départ, condition d'entrée dans la boucle et incrémentation sont regroupés dans les () du for.
echo'<h3 class ="violet">Boucle for  :</h3>';

for ($i = 0; $i < 10; $i++){// tant que $i est inférieur à 10, on entre dans la boucle, puis on incrémente $i à la fin de la boucle avant de revenir dans la condition
    echo $i . '<br>';// on fait 10 tours pour les valeurs de $i allant de 0 à 9
}

echo '<p class="color">Exercice pour la boucle for :<p>';
echo "<p>afficher 12 options avec les valeur de 1 à 12 à l\'aide d\'une boucle for</p>";
// exercice : afficher 12 <option> avec les valeur de 1 à 12 à l'aide d'une boucle for
echo '<select>';
for ($index = 1; $index <= 12; $index++){
    echo '<option>' . $index . ' ' . '</option>';
    // echo "<option>$index</option>"; // autre façon de l'écrire :
}
echo '</select>';
tiret();
//----------
// Boucle foreach :
    echo'<h3 class ="violet">Boucle foreach  :</h3>';

//Il existe aussi la boucle foreach que nous aborderons au chapitre des arrays. Elle sert à parcourir les éléments d'un tableau.
echo '<p>Il existe aussi la boucle foreach que nous aborderons au chapitre des arrays. Elle sert à parcourir les éléments d\'un tableau.</p>';
echo '<br>';
echo '<br>';
tiret();
//-------------------------------------------
echo'<h2>Exercices de mélanges HTML et PHP :</h2>';
//-------------------------------------------
echo '<p class="color">Exercice 1 :<p>';
echo '<p>faites une boucles FOR qui affiche 0 à 9 sur la même ligne. Résultat attendu : "0123456789".</p>';
// Exercice 1 : faites une boucles FOR qui affiche 0 à 9 sur la même ligne. Résultat attendu : "0123456789"

for ($i = 0; $i <= 9; $i++){
    echo $i;
}
echo '<br>';

echo '<br>';

echo '<p>faites une boucles FOR qui affiche 0 à 9 sur la même ligne. Résultat attendu : dans un tavleau.</p>';

// Exercice 1 : faites une boucles FOR qui affiche 0 à 9 sur la même ligne. Résultat attendu : dans un tableau
echo '<p class="color">Exercice 2 :<p>';
echo '<table border = "1">';
    echo '<tr>';
    for($i = 1; $i <= 9; $i++){

        echo '<td class="color largeurT ">' . $i . '</td>';
    }
    echo  '</tr>';
echo '</table>';

// Exercice 3:

// faire une table HTML des 10 lignes et 10 colonnes avec une valeur quelconque à l'intérieur dans un premier temps.
echo '<br>';

echo '<br>';
echo '<p class="color">Exercice 3 niveau simple :<p>';
echo '<p>faire une table HTML des 10 lignes et 10 colonnes avec une valeur quelconque à l\'intérieur dans un premier temps.</p>';

echo '<table border = "1">';
    for ($y = 0; $y <= 9; $y++){
        echo '<tr>';
        for($x = 0; $x <= 9; $x++){
            echo '<td class="color largeurT ">' . $x . '</td>';
        }

        echo  '</tr>';
    }

echo '</table>';
echo '<br>';

echo '<br>';
// faire une table HTML des 10 lignes et 10 colonnes avec une valeur quelconque à l'intérieur dans un premier temps. Puis dans un second temps, numéroter les cellules de 0 à 99.
echo '<p>faire une table HTML des 10 lignes et 10 colonnes avec une valeur quelconque à l\'intérieur dans un premier temps. Puis dans un second temps, numéroter les cellules de 0 à 99..</p>';
echo '<p class="color">Exercice 3 niveau compliqué 1er Méthode :<p>';

echo '<table border = "1">';
    for ($y1 = 0; $y1 <= 9; $y1++){
      
        echo '<tr>';
        for($x1 = 0; $x1 <= 9; $x1++){
            
            echo '<td class="color largeurT ">' . $y1 . $x1 . '</td>';

        }
    }
echo '</table>';

echo '<br>';
echo '<br>';
echo '<hr>';

echo '<p class="color">Exercice 3 niveau compliqué 2eme Méthode:<p>';
echo '<table border = "1">';
    for ($y1 = 0; $y1 <= 9; $y1++){

        echo '<tr>';
        for($x1 = 0; $x1 <= 9; $x1++){
            
            echo '<td class="color largeurT ">' . ($y1*10 + $x1). '</td>';

        }   
    }
echo '</table>';
    echo '<br>';
    echo '<br>';
    echo '<hr>';
    echo '<p class="color">Exercice 3 niveau compliqué 3eme Méthode:<p>';
    $numero = 0;
    echo '<table border = "1">';
        for ($y1 = 0; $y1 <= 9; $y1++){
          
            echo '<tr>';
            for($x1 = 0; $x1 <= 9; $x1++){
                
                echo '<td class="color largeurT ">' . $numero . '</td>';
                $numero++;
            }   
        }
echo '</table>';
echo '<br>';
echo '<br>';
echo '<hr>';
echo '<br>';
echo '<br>';

echo '<p class="color">Exercice 4 niveau compliqué  :<p>';

echo '<table border = "1">';
    for ($y1 = 0; $y1 <= 9; $y1++){
      
        echo '<tr>';
        for($x1 = 0; $x1 <= 9; $x1++){
            
            echo '<td class="color largeurT ">' . ($y1*$x1). '</td>';

        }
        echo  '</tr>';
        
    }
echo '</table>';
tiret();
//-------------------------------------------
echo'<h2>Les tableaux des donnés array :</h2>';
//-------------------------------------------
//Tableau, ou array en anglais, est déclaré comme une variable améliorée dans laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n'importe quel type et possèdent un indice par défaut dont la numérotation commence à 0.

//Bien souvent on récupérera les informations de la BDD sous forme d'array (ou éventuellement d'objet).

//Déclarer un array
$list = array('Grégorie', 'Nathalie', 'Amillie', 'François', 'Georges');// on déclare un array avec le mot clé "array"

//echo $list; // erreur ('array to string conversion')car on ne peut pas afficher directement un array 

// Pour afficher rapidement le contenu de ce tableau
echo '<pre>';
var_dump($list);// affiche le contenu du tableau avec certaines infos en plus comme le type des éléments
echo '</pre>'; //balise HTML qui permet de formater l'affichage de var_dump

echo '<pre>';
print_r($list);
echo '</pre>';

// Fonction pour afficher un print_r
echo'<h3 class ="violet">Fonction pour afficher un print_r  :</h3>';
function debug($param){
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

debug($list);

//-----
echo '<br>';
echo '<br>';
echo '<p class="color"> Autre moyen d\'afficher des valeurs dans un tableau :<p>';
// Autre moyen d'afficher des valeurs dans un tableau :

$tab = ['France', 'Italy', 'Espagne','Portugal'];// on peut utiliser la notation entre crochets pour déclarer un array

$tab[] = 'Suisse';// les crochets vides permettent d'ajouter une valeur à la fin de notre array $tab

debug($tab);

// Afficher la valeur "Italie" de l'array $tab
echo $tab[2];// pour accéder à une afficher  d'un array, on met son indice entre [] après le nom de cet array

//------

echo '<br>';
echo '<br>';
echo '<p class="color">Tableau Associatif :<p>';
// Tableau Associatif :
//Dans un tableau associatif nous pouvons choisir le nom des indices:
$couleur = array(
    'j' => 'jaune',
    'b' => 'bleu',
    'v' => 'vert'
);

debug ($couleur);
// Pour accéder à un élément du tableau associatif :

echo 'la seconde couleur de notre tableau est le  ' . $couleur['b'] . '</br>';
echo "la seconde couleur de notre tableau est le    $couleur[b]  </br>";// affiche aussi "bleu". Un array écrit dans des guillemets ou des quotes perd les quotes autour de son indice
echo '<br>';
echo '<br>';

//Compter le nombre d'éléments contenus dans un array:
echo '<p class="color">Compter le nombre d\'éléments contenus dans un array:<p>';

echo 'Taille du Tableau : ' . count($couleur) . '<br>'; // affiche 3 (éléments)

echo 'Taille du Tableau : ' . sizeof($couleur) . '<br>'; // affiche 3 (éléments) sizeof() est pareil que count() dont il est un alias

echo '<br>';
echo '<br>';
// Un alias de clount():
echo '<p class="color">Un alias de clount() :<p>';
// function sizeof($param){
//     return count($param);
// };
echo '<br>';
echo '<br>';
echo '<br>';
tiret();
//-------------------------------------------
echo'<h2>La boucle foreach pour les  array :</h2>';
//-------------------------------------------
// foreach est un moyen simple de passer en revue un tableau. Elle fonctionne uniquement sur les tableau et les objets.
echo '<p>foreach est un moyen simple de passer en revue un tableau. Elle fonctionne uniquement sur les tableaux et les objets.<p>';

foreach($tab as $valeur){// le mot clé as fait partie de la structure du foreach et est obligatoir. la variable $valeur (que l'on nomme comme on veut) vient parcourir les valeurs du tableau $tab. Quant il y a une seul variable après "as", elle parcourt systématiquement les VALEURS 
    echo $valeur . '<br>'; // on affiche successivement à chaque tour de boucle les éléments du tableau
}

// Parcourir la colonne des indices et la colonne des valeurs:
echo '<p class="color">Parcourir la colonne des indices et la colonne des valeurs:<p>';

foreach($tab as $indice => $valeur){// Quant il y a deux variables après "as", elle parcourt systématiquement toujours les INDICE, et la seconde parcours toujours les VALEURS 
  echo $indice . ' Correspond à ' . $valeur . ' .<br>' ;
}


// Exercice  :
/* Ecrivez 
- écrivez un array avec les indices prenom, nom, email et telephone et mettez y pour valeur des information fictives. Remarque cet array ne concerne qu'une seule personne.
- Puis avec une boucle foreach, affichez les valeurs de votre array dans dans des <p>, sauf le prenom qui doit être affiché dans <p>
*/

$eleve = array(
        'prenom' => 'Mohamed',
        'nom' => 'Yessad',
        'email' => 'mohamed.yessad@lepoles.com',
        'telephone' => '06.08.09.04.99'
);

debug($eleve);

foreach($eleve as $indice => $valeur){
    if ($indice == 'prenom'){

        echo "<h3 class='bleuT'>  $indice :   $valeur  </h3>"  ;
    } else {
        echo " <p class='green'> $indice :   $valeur  </p> "  ;
    }
}

echo '<br>';
echo '<br>';
echo '<br>';
tiret();
//-------------------------------------------
echo'<h2>Les arrays multidimensionnels :</h2>';
//-------------------------------------------

// Nous parlons de tableau multidimensionnel quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.
echo '<p> Nous parlons de tableau multidimensionnel quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.<p>';

// Création d'un tableau multidimensionnel :

echo '<p class="color"> Création d\'un tableau multidimensionnel :<p>';

$tab_multi = array(
    0 => array(
        'prenom' => 'Julien',
        'nom' => 'Dupon',
        'tel' => '0102457878'
    ),
    1 => array(
      'prenom' => 'Nicola',
      'nom' => 'Duron',
      'tel' => '0102457558'
    ),
    2 => array(
        'prenom' => 'Pierre',
        'nom' => 'Dulac'
        )  
);
// il est biensûr possible de choisir le nom des indices de notre array.
echo '<br>';
echo '<br>';
echo '<p class="color"> var_dump($tab_multi) ce qui nous donne un affichage, il sert pour le developpeur :<p>';
var_dump($tab_multi);// le mettre en commentaire en prod, il sert pour le developpeur
echo '<br>';
echo '<br>';
echo '<p class="color"> debug($tab_multi) ce qui nous donne un affichage , il sert pour le developpeur :<p>';
debug($tab_multi);// le mettre en commentaire en prod, il sert pour le developpeur

// Afficher la valeur 'Julien' :
echo '<p class="color"> Afficher la valeur Julien :<p>';
echo $tab_multi[0]['prenom'] . '<hr>'; // affiche Julien. Nous entrons d'abord dans $tab_multi, puis nous allos à son indice [0], puis à l'intérieur nous allons à l'indice ['prenon'].
echo '<br>';
echo '<br>';
echo '<br>';
echo tiret();

//-------
// Parcourir le tableau multidimentionnel avec une boucle for :
echo'<h3 class ="violet">Parcourir le tableau multidimentionnel avec une boucle for :</h3>';

for ($i = 0; $i < count($tab_multi); $i++){// count($tab_multi) vaut 3 car il y a bien 3 élément dans le premier niveau de ce tableau
    echo $tab_multi[$i]['prenom'] . '<br>';// $i prend successivement les valeurs 0 puis 1 puis 2. On affiche donc à chaque tour de boucle "Julien" puis "Nicolas" puis "Pierre"
}
echo '<hr>';

//Exercice  :
// Afficher les 3 prenoms avec une boucle foreach:
echo '<br>';
echo '<br>';
echo '<p class="color">Exercice tableau multidimentionnels :<p>';
echo '<p>Afficher les 3 prénoms avec une boucle foreach :</p>';
foreach($tab_multi as $indice => $valeur){
        echo $tab_multi[$indice]['prenom'] . '<br>';  
}
echo '<br>';
echo '<br>';
// Ou encore
echo '<p> Ou encore :</p>';
echo '<br>';
echo '<br>';
foreach($tab_multi as $indice => $valeur){
   // debug($valeur);
    echo $valeur['prenom'] . '<br>';
}
echo '<br>';
echo tiret();
echo '<br>';
//Pour afficher tous les éléments d'un array multidimentionnel, on fait des boucles foreach imbriquées (une par dimension):
echo '<p>Pour afficher tous les éléments d\'un array multidimentionnel, on fait des boucles foreach imbriquées (une par dimension):</p>';
echo '<br>';
echo '<br>';
foreach ($tab_multi as $indice => $valeur){
    foreach ($valeur as $label => $info){
        echo $label . ' => ' . $info . '<br>';
    }
}

echo '<br>';
echo '<br>';
echo '<br>';
tiret();
//-------------------------------------------
echo'<h2>Les inclusions des fichiers :</h2>';
//-------------------------------------------
// On fait un fichier au meme niveau 01-base et on le nomme exemple.inc.php

echo 'première inclusion : ';
include 'exemple.inc.php';

echo 'Deuxième inclusion:';

include_once 'exemple.inc.php'; // le once vérifie si le fichier a déja été inclus. Si c'est le cas, il ne le ré-inclut pas.

echo 'Troisième inclusion :';
require 'exemple.inc.php';// le fichier est "requis" : en cas d'erreur sur le nom ou le chemin du fichier, require génére une erreur de type "fatal error" et arrête l'exécustion du script

echo 'Qutrième inclusion:';
require_once 'exemple.inc.php';// le once vérifie si le fichier a déja été inclus. Si c'est le cas, il ne le ré-inclut pas

echo '<br>';
echo '<br>';
echo '<br>';
tiret();
//-------------------------------------------
echo'<h2>Introduction aux objets
 :</h2>';
//-------------------------------------------

// Un objet est un autre type de données. Il permet de regrouper des informations : on peut y déclarer des variables appelées PROPRIETES ou ATTRIBUTS, et des fonctions appelées METHODES// Pour créer des objets, nous avons besoin d'un "plan de construction" : c'est le rôle de la classe (note: rien à voir avec le CSS....). Nous créons donc une classe pour créer nos meubles :

class Meuble {// on met une majuscule au nom de la class
   public $marque = 'ikea'; // ici on déclare une propriété "marque" (public pour dire qu'elle est accessible partout)
   public function origine(){
       return 'origine suédoise';
   }

}// une class est un plan d'objets qui contient des propriétés et des méthodes. Ainsi en créant un objet à partir de cette classe, cet objet héritera de ces  propriétés et méthodes.

// Enfin, on crée un objet table :
$table = new meuble();// new est un mot clé qui permet d'instancier la classe Meuble et d'en faire un objet. ON dit que $table est une instance de la class Meuble
debug ($table);// nous pouvons observer le type de $table (object), le nom de la classe dont il provient (Meuble), et sa seule propriété(marque).

echo 'La marque de notre table est : ' . $table->marque .'<br><br>';// pour accéder à la propriété d'un objet, on écrit l'objet suivi du nom de la propriété. Affiche "ikea"
echo $table->origine() . '<br><br>'; //idem pour appeler une méthode d'un objet à laquelle on ajoute une paire de ().