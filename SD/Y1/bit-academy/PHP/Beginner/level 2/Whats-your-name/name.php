<?php

$achternaam = "Wat is je achternaam?";
$voornaam = "Wat is je voornaam?";

// Print de vraag voor de voornaam en lees het antwoord in
echo $voornaam . PHP_EOL;
$reactie1 = readline();

// Print de vraag voor de achternaam en lees het antwoord in
echo $achternaam . PHP_EOL;
$reactie2 = readline();

// Toon de samengevoegde naam met een nieuwe regel
echo "Jouw naam is " . $reactie1 . " " . $reactie2 . PHP_EOL;
