<?php
// Auteur : Chorouq Bakadi
// Objectif : structures de contrôle et boucles
// Date : 29/10/2026

require "config.php";

// Exercice 2.1 : fonction mention()
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

echo "<h2>Exercice 2.1</h2>";
foreach ([18, 15, 12, 10, 7] as $n) {
    echo "Note $n : " . mention($n) . "<br>";
}

// Exercice 2.2 : switch
echo "<h2>Exercice 2.2</h2>";
$mois = date("m");
switch ($mois) {
    case "01": $nomMois = "Janvier"; break;
    case "02": $nomMois = "Février"; break;
    case "03": $nomMois = "Mars"; break;
    case "04": $nomMois = "Avril"; break;
    case "05": $nomMois = "Mai"; break;
    case "06": $nomMois = "Juin"; break;
    case "07": $nomMois = "Juillet"; break;
    case "08": $nomMois = "Août"; break;
    case "09": $nomMois = "Septembre"; break;
    case "10": $nomMois = "Octobre"; break;
    case "11": $nomMois = "Novembre"; break;
    case "12": $nomMois = "Décembre"; break;
    default:   $nomMois = "Mois invalide";
}
echo "Mois courant : $nomMois<br>";
// Question : sans break, PHP continue d'exécuter les case suivants (fall-through)
// jusqu'au prochain break ou la fin du switch.

// Exercice 2.3 : boucles
echo "<h2>Exercice 2.3</h2>";

// 1) Triangle
echo "<pre>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}
echo "</pre>";

// 2) while : 0 à 20 par pas de 2, 10 en gras
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
}
echo "<br>";

// 3) for + continue : nombres pairs de 0 à 10
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo "$i ";
}
echo "<br>";

// 4) while + switch + break 2
$i = 1;
while (true) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;      // sort uniquement du switch
        case 10:
            echo "At 10; quitting<br>";
            break 2;    // sort du switch et de la boucle
    }
    $i++;
}

// 5) do-while : 0 à 20 par pas de 2, 10 en gras
$i = 0;
do {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
} while ($i <= 20);
echo "<br>";
// Différence : do-while exécute le corps au moins une fois (condition testée après),
// while teste la condition avant et peut ne jamais s'exécuter.