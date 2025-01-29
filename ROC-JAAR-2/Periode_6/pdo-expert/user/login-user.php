<?php
require "../includes/user-class.php"; 

if (isset($_SESSION['login_status']) && $_SESSION['login_status'] === true) {
    header("Location: dashboard-user.php");
    exit;
}
try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $user = new User($pdo);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $userData = $user->loginUser($email);
        if ($userData && password_verify($password, $userData['password'])) {
            session_start();
            $_SESSION['login_status'] = true;
            $_SESSION['username'] = $userData['username'];
            header("Location: dashboard-user.php");
            exit;
        } else {
            echo "Ongeldig e-mailadres of wachtwoord.";
            header("Refresh: 2; URL=login-user.php");
            die();
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-user</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="register-user.php">Register User</a></li>
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