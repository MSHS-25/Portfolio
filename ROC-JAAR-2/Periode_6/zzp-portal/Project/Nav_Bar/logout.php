<?php
session_start(); // Start de sessie
session_unset(); // Verwijder alle sessievariabelen
session_destroy(); // Vernietig de sessie
header("Location: ../Homepage/index.php"); // Redirect naar de homepage
exit(); // Zorg ervoor dat de code stopt na de redirect
