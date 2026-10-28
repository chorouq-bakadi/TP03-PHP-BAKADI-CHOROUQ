<?php
// Auteur : Chorouq Bakadi
// Objectif : variables, constantes, types et chaînes
// Date : 28/10/2026

// Commentaire sur une ligne avec //
# Commentaire sur une ligne avec #
/* Commentaire
   sur plusieurs lignes */

require "config.php";

echo 'Hello PHP';
echo "<br>";

// Exercice 1.1 : noms de variables
// $x       : valide
// $_x      : valide (commence par _)
// $2x      : invalide (commence par un chiffre)
// $x-y     : invalide (le tiret est interdit)
// $Prix_HT : valide
// $prix ht : invalide (espace interdit)
// $état    : valide (les caractères accentués sont autorisés)
$x = 1;
$_x = 2;
$Prix_HT = 60;
$état = "ok";

$a = 5;
$A = 10;
echo "a = $a et A = $A (variables distinctes)<br>";

// Exercice 1.2 : constantes
echo ETABLISSEMENT . "<br>";
echo NOTE_MIN . " - " . NOTE_MAX . " - " . SEUIL . "<br>";
var_dump(defined('SEUIL'));
var_dump(defined('INCONNUE'));
echo "<br>";
// Constante non définie : PHP 8 lève une erreur fatale (Error "Undefined constant").
// const : défini à la compilation, hors blocs conditionnels ; define() : défini à l'exécution, utilisable dans un if.

// Exercice 1.3 : calcul
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht + $prix_ht * $tva / 100;
echo "Le prix TTC du produit est de $prix_ttc €.<br>";
echo "<hr>";

// Exercice 1.4 : types et conversions
$test = 42;
$test = (string) $test;
var_dump($test);
echo "<br>";

// Prédictions (bool) : 0 false, 0.0 false, "0" false, "" false, "abc" true, [] false, null false
echo "<pre>";
var_dump((bool) 0, (bool) 0.0, (bool) "0", (bool) "", (bool) "abc", (bool) [], (bool) null);

// Prédictions : (int) 3.9 = 3, (int) "12abc" = 12, (float) "1.5e3" = 1500, (int) true = 1
var_dump((int) 3.9, (int) "12abc", (float) "1.5e3", (int) true);
echo "</pre>";

// 255 en décimal, hexadécimal, octal, binaire
$dec = 255;
$hex = 0xFF;
$oct = 0377;
$bin = 0b11111111;
echo "Décimal : $dec<br>Hexadécimal : $hex<br>Octal : $oct<br>Binaire : $bin<br>";

echo "<hr>";

// Exercice 1.5 : chaînes de caractères
$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"<br>';
echo "Voulez-vous supprimer C:\\.?<br>";
echo 'Ceci n\'affichera pas \n de nouvelle ligne (le \n doit apparaître tel quel)<br>';
echo 'Les variables ne seront pas $traitees $ici (variables non interprétées)<br>';
echo "Les variables seront $traitees $ici (variables interprétées)<br>";

// trim() pour retirer les *
$texte = trim("Bonjour les développeurs", "*");
echo $texte . "<br>";

// Chaque lettre sur une ligne
for ($i = 0; $i < strlen($texte); $i++) {
    echo $texte[$i] . "<br>";
}