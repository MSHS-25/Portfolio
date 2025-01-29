<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy(); 
    header("logOut.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="../product/insert-product.php">Insert Product</a></li>
        </ul>
    </nav>
    <h1>Welkom, gebruiker!</h1>
    <form method="POST">
        <button type="submit" name="logout">Uitloggen</button>
    </form>
</body>
</html>