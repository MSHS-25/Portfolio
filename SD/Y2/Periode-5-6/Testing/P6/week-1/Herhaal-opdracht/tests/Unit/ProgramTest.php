<?php
require_once __DIR__ . '/../../src/Program.php';

class ProgramTest extends PHPUnit\Framework\TestCase
{
    public function testAverage() // Hier test ik de functionaliteit van de calculatie.
    {
        // Arrange
        $numbers = [1, 2, 3, 4, 5];
        // Act
        $result = calculateAverage($numbers);
        // Assert
        $this->assertEquals(3, $result);
    }

    public function testAverageWithNegativeNumbers(){
        // Arrange
        $numbers = [-5, 5, 10, -10, 0];
        // Act
        $result = calculateAverage($numbers);
        // Assert
        $this->assertEquals(0, $result);
    }

    public function testAverageWithIdenticalNumbers() {
        // Arrange
        $numbers = [5, 5, 5, 5, 5];
        // Act
        $result = calculateAverage($numbers);
        // Assert
        $this->assertEquals(5, $result);
    }   
}
?>
