<?php
require "../Database/db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verkrijg de invoer van het formulier
    $project_name = $_POST['project_name'];
    $project_password = $_POST['project_password'];

    try {
        // Maak de PDO verbinding
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=zzp', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        // Controleer of het project met de gegeven naam en wachtwoord bestaat
        $stmt = $pdo->prepare("SELECT id, name, password FROM projects WHERE name = :project_name AND password = :project_password LIMIT 1");
        $stmt->execute([
            ':project_name' => $project_name,
            ':project_password' => $project_password
        ]);
        $project = $stmt->fetch();

        if ($project) {
            // Sla de project ID op in de sessie
            $_SESSION['project_id'] = $project['id'];
            $_SESSION['project_name'] = $project['name'];
            echo "Inloggen succesvol! Je kunt nu boeken voor project: " . $project['name'];
            header("Location: booking.php"); // Ga door naar de boekingspagina
            exit();
        } else {
            echo "Fout: De projectnaam of het wachtwoord is incorrect.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen op Project</title>
    <link rel="stylesheet" href="../Css/Project_login.css">
</head>
<body>
    <?php require "../Nav_Bar/navbar.php"; ?>
    <h1>Inloggen op Project</h1>

    <form action="project_login.php" method="POST">
        <label for="project_name">Projectnaam:</label><br>
        <input type="text" id="project_name" name="project_name" required><br><br>

        <label for="project_password">Project Wachtwoord:</label><br>
        <input type="password" id="project_password" name="project_password" required><br><br>

        <input type="submit" value="Inloggen">
    </form>
    <?php require "../Footer_Page/footer.php"; ?>
</body>
</html>