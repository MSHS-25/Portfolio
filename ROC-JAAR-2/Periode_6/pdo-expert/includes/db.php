<?php
class DB {
  private $pdo;
  protected $stmt;
  public function __construct($db, $host = "localhost", $user = "root", $pass = "")

  {
    try {
      $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die ("Connection failed: "). $e->getMessage();
    }
  }

  public function execute($sql, $args = null){
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($args);
    return $stmt;
  }
}
$pdo = new DB('PDO_expert');
?>