<style>
    h2{font-size: 15px; color: orange;}
    .vert{
        background: green;
    }
    .jaune{
        background: yellow;
    }
    .bleu{
        background: blue;
    }
    .rouge{
        background: red;
    }
    .violet{
        background: olive;
    }
   
</style>

<?php
//---------------------
echo'<h2> les bases</h2>';
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
echo'<h2> Affichage dans le navigateur</h2>';
//---------------------------------------------
// echo est une instriction qui permet d'afficher  dans le navigateur. Notez que nous pouvons y mettre du HTML.
// Toutes les instrictions se terminenent  par un ";".

print 'Nous sommes lundi <br>'; //  autre instruction  d'affichage

//Deux autres intruction d'affichage existe (nous les verrons plus loin):
print_r('message');
echo '<br>';
var_dump('message');

//pour faire un commentair sur une seul ligne

/*
pour faire un commentaire
sur plusieurs ligne
*/

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

//-------------------------------------------------------------
echo'<h2> Concaténation</h2>';
//------------------------------------------------------------

// En PHP on concatène avec le symbole "." qui peut se traduire par "suivi de".

$x = 'Bonjour ';
$y = 'Tout le monde';

echo $x . $y . '<br>';// par convention on met les espaces entre les point '.' de la concaténation // affiche "Bonjour tout le monde"
echo $x , $y , '<br>';// sa fonctionne uniquement avec echo // on peut séparer les arguments à afficher dans echo par une ",". Attention, ne fonctionne pas avec print. de préférence d'oublier cette syntaxe

//-------------------------------------------------------------
echo'<h2> Concaténation lors de l\'affectation</h2>';
//------------------------------------------------------------

$prenom1 = 'Bruno ';
$prenom1 = 'Claire';
echo $prenom1 .  '<br>';// Dans ce cas il affiche Claire car la dexième affectation écraseta la première

$prenom1 = 'Bruno et';
$prenom1 .= ' Claire';// l'opérateur .= permet d'ajouter la valeur "Claire" à la valeur "Bruno et" contenue dans $prenom1 sans l'écraser. affiche donc "Bruno et Claire"
echo $prenom1 .  '<br>'; // dans ce cas il affiche Bruno et Claire

//-------------------------------------------------------------
echo'<h2> Guillemets et quotes </h2>';
//------------------------------------------------------------

$message = "aujourd'hui";
$message = 'aujourd\'hui'; // on échape les apostrophes dans les quotes simples (AltGr + 8)

// --------------
$txt = 'Bonjour';
echo "$txt tout le monde <br>";// dans des guillemet la variable est évaluée: c'est son contenu qui est affiché
echo '$txt tout le monde <br>';// dans des quotes simple, le nom de la variable est traité commme du texte brut

//-------------------------------------------------------------
echo'<h2> Constante </h2>';
//------------------------------------------------------------
//Une constante permet de conserver une valeur sauf que celle-ci ne pourra pas être modifiée durant l'exécution du ou des scripts. Utile par exemple pour conserver les paramètres de connexion à la BDD afin de ne pas pouvoir les altérer

define('CAPITALE', 'Paris');// déclare la constante appelée CAPITALE et lui affecte la valeur 'Paris'. PAr convention, les constantes s'écrivent en majuscules.

echo CAPITALE . '<br>'; // affiche Paris

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

//----
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
echo '<p>empty(): teste si c\'est vide (c\'est-à-dire 0, \'\', NULL, false ou non défini)</p>';

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
echo '<h2 class ="violet"> phpinfo() :<h3>';           
echo '<p> fonction prédéfinie qui affiche des informatios sur le contexte d\'exécution du script</p>';
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

//------------------------------------------------
echo'<h3>Les Fonctions Prédéfinies </h3>';
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
echo'<h3>Les Fonctions Utilisateur </h3>';
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
echo '<p>Exercice d\'pplication :<p>';

function appliqueTva($nombre){
    return $nombre*1.2;
}

// Votre code :

function appliqueTva2($taux){
    return 5*$taux;
}

echo  appliqueTva2('2');












