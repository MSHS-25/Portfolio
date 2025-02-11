<?php

require_once __DIR__ . "\..\..\src\Program.php";

class ProgramTest extends PHPUnit\Framework\TestCase {
    public function testSimpeleGroet() {
        // Arrange
        $ng = new Groet();
        $naam = "Piet";
        // Act
        $result = $ng->groet($naam);
        // Assert
        $this->assertEquals("Hallo Piet.", $result);
    }

    public function testVriend() {
        // Arrange
        $ng = new Groet();
        $naam = NULL;
        // Act
        $result = $ng->groet($naam);
        // Assert
        $this->assertEquals("Hallo vriend.", $result);
    }

    public function testSlechthorende() {
        // Arrange
        $ng = new Groet();
        $naam = "PIET";
        // Act
        $result = $ng->groet($naam);
        // Assert
        $this->assertEquals("HALLO PIET!", $result);
    }

    public function testTweeNamen() {
        // Arrange
        $ng = new Groet();
        $naam = array("Piet", "Soumaya");
        // Act
        $result = $ng->groet($naam);
        // Assert
        $this->assertEquals("Hallo Piet en Soumaya.", $result);
    }

    public function testMeerdereNamen() {
        // Arrange
        $ng = new Groet();
        $naam = array("Piet", "Soumaya", "Olaf");
        // Act
        $result = $ng->groet($naam);
        // Assert
        $this->assertEquals("Hallo Piet, Soumaya en Olaf.", $result);
    }
}
?>