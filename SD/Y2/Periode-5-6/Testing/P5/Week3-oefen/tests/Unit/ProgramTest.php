<?php
require_once __DIR__ . '/../../src/Program.php'; 

use PHPUnit\Framework\TestCase;

class ProgramTest extends TestCase
{
    public function testFizz() {
        // Arrange
        $fb = new FizzBuzz();
        $input = 12;
        // Act
        $result = $fb->fizzbuzz($input);
        // Assert
        $this->assertEquals("Fizz", $result);
    }

    public function testBuzz() {
        // Arrange
        $fb = new FizzBuzz();
        $input = 25;
        // Act
        $result = $fb->fizzbuzz($input);
        // Assert
        $this->assertEquals("Buzz", $result);
    }

    public function testFizzBuzz() {
        // Arrange
        $fb = new FizzBuzz();
        $input = 15;
        // Act
        $result = $fb->fizzbuzz($input);
        // Assert
        $this->assertEquals("FizzBuzz", $result);
    }

    public function testNoFizzBuzz() {
        // Arrange
        $fb = new FizzBuzz();
        $input = 8;
        // Act
        $result = $fb->fizzbuzz($input);
        // Assert
        $this->assertEquals("8", $result); 
    }
}
?>
