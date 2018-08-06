<style>
    h2{font-size: 15px; color: orange;}
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

//Deux autres intruction d'affichage existe (nous les berrons plus loin):
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
// Définitions :
// empty(): teste si c'est vide (c'est-à-dire 0, '', NULL, false ou non défini)

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













