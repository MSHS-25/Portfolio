<?php

$tekst = "Voer het eerste getal in: ";
echo $tekst;

$getal1 = fgets(STDIN);

$tekst2 = "Voer het tweede getal in: ";
echo $tekst2;

$getal2 = fgets(STDIN);

$resultaat = $getal1 * $getal2; 

echo $resultaat;
?>
