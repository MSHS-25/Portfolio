 <?php

require "../Database/user-class.php"; // Database verbinding

session_start(); // Start de session

if (!isset($_SESSION['account_id']) || $_SESSION['user_type'] != 'klanten') { // controlleert de account id en user type
    echo "U moet eerst inloggen als klant om de projectenpagina te bekijken."; 
    exit;
}

try { 
    $db = new DB('ZZP', 'localhost', 'root', ''); // Een object wordt aangemaakt van de klas DB
    $projecten = new User($db); // Een object wordt aangemaakt van de klas User

    $projectView = $projecten->viewProjecten(); // Roept de functie 'viewProjecten' aan
    if (!$projectView) {
        echo "Er zijn geen projecten gevonden.";
    }
} catch (\Exception $e) { // Errors worden hier opgevangen
    echo "Error: " . $e->getMessage();
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/beheer.css">
    <title>Projects overview</title>
</head>
<body>
    <div class="outer-container">
        <?php
            require "../Nav_Bar/navbar.php";
        ?>
        <div class="inner-container">
            <h1>Projects overview</h1>
            <h2>Current projects</h2>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Project ID</th>
                        <th>Project naam</th>
                        <th>Uren</th>
                        <th>Beschrijving</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php // Zet de gegevens in een tabel met behulp van een foreach
                        if (!empty($projectView)) {
                            foreach ($projectView as $project) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($project['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($project['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($project['hours']) . "</td>";
                                echo "<td>" . htmlspecialchars($project['description']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Er zijn geen projecten gevonden.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <?php 
            require "../Footer_Page/footer.php";
        ?>
    </div>
</body>
</html>