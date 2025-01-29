<?php
require "../includes/product-class.php"; 
session_start();

if ($_SESSION['login_status'] !== true){
    header("Location: ../user/login-user.php");
    die();
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $target_path = "../images/";  
        $target_path = $target_path . basename($_FILES['foto']['name']);   
        
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {  
            $user = new Product($pdo);
            $user->insertProduct($_POST['omschrijving'], $target_path, $_POST['prijsPerStuk']);
            echo "Product successfully inserted!";
        } else {  
            echo "Product niet geupload";
        }  
    }
} catch (Exception $e) {
    echo "Error " . htmlspecialchars($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
</head>
<body>
        <form action="insert-product.php" method="POST" enctype="multipart/form-data">
            <label for="omschrijving">Omschrijving</label>
            <input type="text" id="omschrijving" name="omschrijving" required>
            <br>

            <label for="foto">Foto</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
            <br>
            
            <label for="prijsPerStuk">Prijs per stuk</label>
            <input type="text" id="prijsPerStuk" name="prijsPerStuk" required>
            <br>

            <input type="submit">
        </form>
</body>
</html>