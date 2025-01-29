<?php
require "db.php"; // Verbindt met de database via db.php

class User { // Definieert een klasse voor gebruikersbeheer (registratie, login, etc.)
    public $pdo;
    public function __construct(DB $pdo){
        $this->pdo = $pdo->getPDO(); // Maakt gebruik van de databaseverbinding
    }

    // Functie om een nieuwe gebruiker te registreren
    public function registerUser($name, $email, $password, $userType) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Wachtwoord beveiligen
        $query = "INSERT INTO accounts (name, email, password, user_type) VALUES (:name, :email, :password, :user_type)";
        $stmt = $this->pdo->prepare($query); // Bereidt SQL-query voor
        $stmt->bindParam(':name', $name); // Bindt parameters aan de query
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':user_type', $userType);
        
        // Voert de query uit en geeft een melding
        if ($stmt->execute()) {
            echo "User registered successfully!";
        } else {
            echo "Error: Could not register user.";
        }
    }

    // Functie om een gebruiker in te loggen
    public function loginUser($email, $password) {
        $query = "SELECT * FROM accounts WHERE email = :email"; // Haalt gebruiker op via e-mail
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Haalt gebruikersgegevens op
        
        // Verifieert de gebruiker en null
        if ($user && password_verify($password, $user['password'])) {
            return $user; 
        } else {
            return null; 
        }
    }

    // Functie om alle projecten uit de database op te halen
    public function viewProjecten() {
        $query = "SELECT * FROM projects";
        $stmt = $this->pdo->prepare($query); // Bereidt de query voor
        $stmt->execute(); // Voert de query uit
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Returnt alle projecten
    }
}
?>
