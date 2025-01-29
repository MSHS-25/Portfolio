<?php
session_start(); // Start the session
require "../Database/db.php"; // Database verbinding

if (!isset($_SESSION['account_id'])) {
    echo "Account ID is niet beschikbaar. Log in alstublieft opnieuw.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST['name'] ?? null;
    $hours = $_POST['hours'] ?? null;
    $description = $_POST['description'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$name || !$hours || !$password) {
        echo "Vul alle vereiste velden in.";
        exit;
    }

    try {
        $pdo = new DB('zzp');
        $sql = "INSERT INTO projects (name, hours, description, account_id, password) 
                VALUES (:name, :hours, :description, :account_id, :password)";
        $pdo->execute($sql, [
            ':name' => $name,
            ':hours' => $hours,
            ':description' => $description,
            ':account_id' => $_SESSION['account_id'],
            ':password' => $password
        ]);
        echo "Het project is succesvol toegevoegd!";
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Project Toevoegen</title>
    <link rel="stylesheet" href="../Css/insert_page.css">
</head>
<body>
    <?php require "../Nav_Bar/navbar.php"; ?>
    <h1>Nieuw Project Toevoegen</h1>
    <form action="insert_page.php" method="POST">
        <label for="name">Projectnaam:</label><br>
        <input type="text" id="name" name="name" required><br>
        
        <label for="hours">Maximaal Aantal Uren:</label><br>
        <input type="number" id="hours" name="hours" required><br>
        
        <label for="description">Beschrijving:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br>
        
        <label for="password">Voeg een wachtwoord toe:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Voeg Project Toe">
    </form>
    <?php require "../Footer_Page/footer.php"; ?>
</body>
</html>