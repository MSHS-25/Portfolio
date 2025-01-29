<?php
require "db.php";
    Class Product{
        public $pdo;
        public function __construct(DB $pdo){
            $this->pdo = $pdo;
        }
        public function insertProduct($omschrijving, $foto, $prijsPerStuk) : PDOStatement | False
        {
            return $this->pdo->execute("INSERT INTO products (omschrijving, foto, prijsPerStuk)
            VALUES (:omschrijving, :foto, :prijsPerStuk)", ["omschrijving"=>$omschrijving, "foto"=>$foto, "prijsPerStuk"=>$prijsPerStuk]);
        }
    }   
?>