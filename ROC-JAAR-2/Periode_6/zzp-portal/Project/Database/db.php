<?php
class DB { // Database class aanmaken en private, protected voor veiligheid en privacy
    private $pdo;
    protected $stmt;

    public function __construct($db, $host = "localhost", $user = "root", $pass = "") { //de constructor is een manier hoe wij verbinden met onze database
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) { // catch de error
            die("Connection failed: " . $e->getMessage()); // bij het falen van een connectie catch de error en laat het zien
        } 
    }
    public function execute($sql, $args = null) { // execute function om code te verkorten en simpeler maken
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);  
        return $stmt; 
    }

    public function getPDO() { // pdo als object maken
        return $this->pdo;
    }
}
$pdo = new DB('ZZP'); // roep de classe aan en geef het een naam 'ZZP'
?>
