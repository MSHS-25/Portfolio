<?php
require "../includes/user-class.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User($pdo);
    $success = $user->registerUser($_POST['username'], $_POST['email'], $_POST['password']);
    if ($success) {
        header("Location: login-user.php");
        exit;
    } else {
        echo "Registratie mislukt. Probeer het opnieuw.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-user</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="login-user.php">login</a></li>
        </ul>
    </nav>
    <form method="POST">      
        <label for="name">Name:</label>
        <input type="text" id="username" name="username" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit"></input>
    </form>
</body>
</html>