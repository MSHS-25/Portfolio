<?php
require "../Database/db.php";
$pdo = new DB('ZZP');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = 'klanten';

    $checkEmailQuery = "SELECT COUNT(*) FROM accounts WHERE email = :email";
    $stmt = $pdo->getPDO()->prepare($checkEmailQuery);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $emailExists = $stmt->fetchColumn();

    if ($emailExists > 0) {
        echo "<p style='color: red;'>Dit e-mailadres is al in gebruik. Kies een ander e-mailadres.</p>";
    } else {
        $query = "INSERT INTO accounts (name, email, password, user_type) 
                  VALUES (:name, :email, :password, :user_type)";
        $stmt = $pdo->getPDO()->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':user_type', $user_type);

        if ($stmt->execute()) {

            $account_id = $pdo->getPDO()->lastInsertId();

            $klantenQuery = "INSERT INTO klanten (name, address, phone, account_id) 
                             VALUES (:name, NULL, NULL, :account_id)";

            $klantenStmt = $pdo->getPDO()->prepare($klantenQuery);
            $klantenStmt->bindParam(':name', $name);
            $klantenStmt->bindParam(':account_id', $account_id);

            if ($klantenStmt->execute()) {

                header("Location:../Login_page/login.php");

                exit();
            } else {
                echo "<p style='color: red;'>Er is een fout opgetreden bij het registreren van de klant in de klanten-tabel.</p>";
            }
        } else {
            echo "<p style='color: red;'>Er is een fout opgetreden bij het registreren van de gebruiker in de accounts-tabel.</p>";
        }
    }    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link rel="stylesheet" href="../Css/register_page.css">
</head>
    <body>
        <?php
            require "../Nav_Bar/navbar.php";
        ?>
        <h2>Register a New account</h2>
        <form method="POST">
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Register">
        </form>
        <?php 
            require "../Footer_Page/footer.php";
        ?>
    </body>
</html>
