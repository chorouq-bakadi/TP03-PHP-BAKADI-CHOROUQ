<?php
// Auteur : Chorouq Bakadi
// Objectif : manipulation des tableaux (affichage, statistiques, tris)
// Date : 29/10/2026

require "config.php";

function mention($note)
{
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

// Exercice 3.1 : création
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];
$modules = ["PHP", "Algorithmique", "Base de données"];

echo "<h2>Exercice 3.1</h2>";
foreach ($modules as $m) {
    echo $m . "<br>";
}
for ($i = 0; $i < count($modules); $i++) {
    echo "Module $i : " . $modules[$i] . "<br>";
}

// Exercice 3.2 : affichage HTML
echo "<h2>Exercice 3.2</h2>";
echo "<table border='1' cellpadding='6'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";
foreach ($notes as $nom => $note) {
    $style = ($note < SEUIL) ? " style='color:red'" : "";
    echo "<tr$style><td>$nom</td><td>$note</td><td>" . mention($note) . "</td></tr>";
}
echo "</table>";

// Exercice 3.3 : statistiques
echo "<h2>Exercice 3.3</h2>";
$somme = 0;
$max = NOTE_MIN;
$min = NOTE_MAX;
foreach ($notes as $note) {
    $somme += $note;
    if ($note > $max) { $max = $note; }
    if ($note < $min) { $min = $note; }
}
$moyenne = $somme / count($notes);
echo "Somme : $somme<br>Moyenne : " . round($moyenne, 2) . "<br>Meilleure : $max<br>Plus faible : $min<br>";

echo "Vérification : " . array_sum($notes) . " / " . count($notes) . " / " . max($notes) . " / " . min($notes) . "<br>";

$effectifs = [];
foreach ($notes as $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}
echo "<pre>";
print_r($effectifs);
echo "</pre>";

// Exercice 3.4 : tris
function afficher($tab)
{
    foreach ($tab as $k => $v) {
        echo "$k : $v<br>";
    }
}

echo "<h2>Exercice 3.4</h2>";
$t = $notes; ksort($t);  echo "<h3>Noms croissants (ksort)</h3>";  afficher($t);
$t = $notes; arsort($t); echo "<h3>Notes décroissantes (arsort)</h3>"; afficher($t);
$t = $notes; krsort($t); echo "<h3>Noms décroissants (krsort)</h3>"; afficher($t);
$t = $notes; asort($t);  echo "<h3>Notes croissantes (asort)</h3>";  afficher($t);
// Question : pour un tableau indexé comme $modules, on utilise sort() (ou rsort() pour décroissant).

// Exercice 3.5 : opérateurs de tableaux
echo "<h2>Exercice 3.5</h2>";
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];
echo "<pre>";
print_r($a + $b);
var_dump($a == $b);
var_dump($a === $b);
echo "</pre>";
// $a + $b : union, garde les clés de $a, ajoute celles de $b absentes de $a -> ["x"=>1,"y"=>2]
// $a == $b : true, mêmes paires clé/valeur (l'ordre n'importe pas)
// $a === $b : false, mêmes paires mais pas dans le même ordre (et mêmes types)