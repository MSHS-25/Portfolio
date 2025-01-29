<?php
require "../Database/db.php"; // Database connection
session_start(); // Start de session

if (!isset($_SESSION['account_id']) || $_SESSION['user_type'] != 'klanten') { // controlleert de account id en user type
    echo "U moet eerst inloggen als klant om de projectenpagina te bekijken."; 
    exit;
}

$account_id = $_SESSION['account_id']; 
$db = new DB('ZZP'); // de class DB aanroepen en als naam ZZP 
$pdo = $db->getPDO(); // PDO aanroepen

try { // try om de query te voeren
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE account_id = :account_id");
    $stmt->bindValue(':account_id', $account_id, PDO::PARAM_INT);
    $stmt->execute();
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
} catch (PDOException $e) { // catch om de error te catchen
    echo "Database error: " . $e->getMessage();
    exit();
} 
?> 
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Projecten</title>
    <link rel="stylesheet" href="../Css/customer_page.css">

</head>
<body>
    <?php require "../Nav_Bar/navbar.php"; // Navbar aanroepen ?>

    <h1>Overzicht van uw projecten</h1>
    <p>Aantal projecten: <?php echo count($projects); // count gebruiken we om het aantal projecten op te tellen ?></p> 

    <table border="1">
        <thead>
            <tr>
                <th>Projectnaam</th> 
                <th>Maximaal aantal uren</th>
                <th>Beschrijving</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($projects):  // een if statement met for loop om alles uit te printen?>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($project['name']);  ?></td> // htmlspecialchars voor de veiligheid
                        <td><?php echo htmlspecialchars($project['hours']); ?></td>
                        <td><?php echo htmlspecialchars($project['description']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">U heeft geen projecten.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php require "../Footer_Page/footer.php"; // footer aanroepen ?>
</body>
</html>