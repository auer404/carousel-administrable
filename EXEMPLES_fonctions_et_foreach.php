<?php 

function multiplier_par_deux($valeur_a_multiplier) {

    $valeur_finale = $valeur_a_multiplier * 2;

    return $valeur_finale;
}

///////

$nombre = 10;
$nombre2 = 15;

$nombre_modifie = multiplier_par_deux($nombre);
$nombre2_modifie = multiplier_par_deux($nombre2);

echo $nombre_modifie;
echo"<br>";
echo $nombre2_modifie;

////////////////////////

$t = ["a","b","c"];

foreach($t as $t_elem) {
    echo "<p>La valeur est : $t_elem</p>";
}

foreach($t as $t_index => $t_elem) {
    echo "<p>La valeur de \$t[$t_index] est : $t_elem</p>";
}

?>