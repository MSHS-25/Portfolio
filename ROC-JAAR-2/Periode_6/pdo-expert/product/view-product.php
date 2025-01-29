<?php
require "../includes/product-class.php";

session_start();

if ($_SESSION['is_logged_in'] != true) {
    header("Location:../login-user.php");
    die();
}

try {
    $producten = new Product();

    $productData = $producten->viewProduct();
    if (!$productData) {
        echo "Er zijn geen producten gevonden.";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten overzicht</title>
</head>
<body>
    <h1>Producten overzicht</h1>
    <table border=2>
        <tr>
            <th>Product ID</th>
            <th>Product naam</th>
            <th>Prijs</th>
            <th>Omschrijving</th>
            <th>Foto</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
            <?php

            foreach ($productData as $productData1) {
                echo "<tr>";
                echo "<td>" . $productData1['product_id'] . "</td>";
                echo "<td>" . $productData1['name'] . "</td>";
                echo "<td>" . $productData1['price'] . "</td>";
                echo "<td>" . $productData1['description'] . "</td>";
                echo "<td><img src='" . $productData1['target_path'] . "'></td>";
                echo "<td><a href='edit-product.php?product_id=" . $productData1['product_id'] . "'>Edit</a></td>";
                echo "<td><a href='delete-product.php?product_id=" . $productData1['product_id'] . "'>Delete</a></td>";
                echo "</tr>";
            }

            ?>
    </table>
    <a href="../user/dashboard-user.php">Dashboard</a>
    <a href="../product/insert-product.php">Producten</a>
    <a href="../product/view-product.php">Overzicht</a>
</body>
</html>