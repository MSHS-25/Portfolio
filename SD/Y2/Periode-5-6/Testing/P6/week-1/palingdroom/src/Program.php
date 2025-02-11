<?php
 // voor deze function heb ik https://www.w3schools.in/php/examples/check-palindrome-string gebruikt om de opdracht te maken.
function isPalindrome($string)
{

    $originalString = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $string));

    $reversedString = strrev($originalString);

    return $originalString === $reversedString;
}
?>
