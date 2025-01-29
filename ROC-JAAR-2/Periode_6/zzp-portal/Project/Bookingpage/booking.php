<?php
require "../Database/db.php";
session_start();

if (!isset($_SESSION['project_id'])) {
    echo "Je bent niet ingelogd. Gelieve in te loggen op een project.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_datetime = $_POST['start_datetime'];
    $end_datetime = $_POST['end_datetime'];
    $totaal_uren = $_POST['totaal_uren'];
    $project_id = $_SESSION['project_id'];

    try {
        // Maak de PDO vxerbinding
        $db = new DB('ZZP');
        $pdo = $db->getPDO();

        // Haal de projectgegevens op om te controleren of de uren niet te veel zijn
        $stmt = $pdo->prepare("SELECT id, hours FROM projects WHERE id = :project_id LIMIT 1");
        $stmt->execute([':project_id' => $project_id]);
        $project = $stmt->fetch();

        if (!$project) {
            echo "Fout: Het project bestaat niet.";
            exit();
        }

        // Controleer of de ingevoerde uren niet groter zijn dan de maximale uren voor het project
        if ($totaal_uren > $project['hours']) {
            echo "Fout: Het aantal uren mag niet groter zijn dan de maximaal toegestane uren voor dit project.";
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO locatie_boeken (project_id, start_datetime, end_datetime, totaal_uren) 
                               VALUES (:project_id, :start_datetime, :end_datetime, :totaal_uren)");
        $stmt->execute([
            ':project_id' => $project_id,
            ':start_datetime' => $start_datetime,
            ':end_datetime' => $end_datetime,
            ':totaal_uren' => $totaal_uren
        ]);

        echo "Locatie succesvol geboekt voor project: " . $project['id'];
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
    <title>Locatie Boeken</title>
    <link rel="stylesheet" href="../Css/Booking.css">
</head>
<body>
    <?php require "../Nav_Bar/navbar.php"; ?>
    <h1>Boek een Locatie voor je Project</h1>

    <form action="booking.php" method="POST">
        <label for="start_datetime">Begintijd (Datum en Uur):</label><br>
        <input type="datetime-local" id="start_datetime" name="start_datetime" required><br><br>

        <label for="end_datetime">Eindtijd (Datum en Uur):</label><br>
        <input type="datetime-local" id="end_datetime" name="end_datetime" required><br><br>

        <label for="totaal_uren">Totaal Uren:</label><br>
        <input type="number" id="totaal_uren" name="totaal_uren" required><br><br>

        <input type="submit" value="Boek Locatie">
    </form>
    <?php require "../Footer_Page/footer.php"; ?>
</body>
</html>
