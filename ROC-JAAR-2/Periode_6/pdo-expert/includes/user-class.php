<?php
require "db.php";

Class User{
    public $pdo;
    // dit regelt de connectie
    public function __construct(DB $pdo){
        $this->pdo = $pdo;
    }
    // deze functie zorgt voor een nieuwe user
    public function registerUser($username, $email, $password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->pdo->execute("INSERT INTO users (username, email, password)
        VALUES (:username, :email, :password)", ["username"=>$username, "email"=>$email,"password"=> $hash]);
    }   
  public function loginUser($email){
    return $this->pdo->execute("SELECT * FROM users WHERE email = :email", ["email"=>$email])->fetch(); 
  }
}
?>