<?php
require "../Database/db.php"; // Database verbinding
$pdo = new DB('ZZP'); // de classe aanroepen met new DB en dan zzp als naam
session_start(); // session_start om onze gegevens op te slaan als we inloggen

if ($_SERVER["REQUEST_METHOD"] == "POST") { // haal de email en wachtwoord op via de post method vanuit mijn forum
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT id, name, password, user_type FROM accounts WHERE email = :email"; // select statement om te controlleren
    $stmt = $pdo->getPDO()->prepare($query); // prepare de query
    $stmt->bindParam(':email', $email); 
    $stmt->execute(); 
    $user = $stmt->fetch(PDO::FETCH_ASSOC); 

    if ($user && password_verify($password, $user['password'])) {  // controlleren of de wachtwoord correct is
        if ($user['user_type'] == 'klanten') { // controlleren of de gebruiker een klant is
            $_SESSION['account_id'] = $user['id']; 
            $_SESSION['username'] = $user['name'];  
            $_SESSION['user_type'] = $user['user_type']; 
            header("Location:../Homepage/index.php"); // redirect naar een ander pagina
            exit();
        } else {
            echo "<p style='color: red;'>U heeft geen toegang tot deze omgeving. Neem contact op met de beheerder.</p>"; // als de gebruiker geen klant is
        }
    } else {
        echo "<p style='color: red;'>Ongeldige inloggegevens. Probeer het opnieuw.</p>"; // als de inloggegevens niet kloppen
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Css/Login_page.css">
</head>
<body>
    <?php
        require "../Nav_Bar/navbar.php"; // Navbar aanroepen
    ?>
    <h2>Login</h2>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
    <?php 
        require "../Footer_Page/footer.php";
    ?>
</body>
</html>
