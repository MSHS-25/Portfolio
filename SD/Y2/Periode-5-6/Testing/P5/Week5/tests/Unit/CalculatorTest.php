<?php
require_once __DIR__ . '/../../src/Calculator.php'; 
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase { 
    public function testAdd() {
        // Arrange
        $calculator = new Calculator();
        // Act
        $result = $calculator->add(2, 3);
        // Assert
        $this->assertEquals(5, $result);
    }

    public function testAddWithNegativeNumbers() { 
        // Arrange
        $calculator = new Calculator(); 
        // Act & Assert
        $this->expectException(InvalidArgumentException::class);
        $calculator->add(-2, 3);
    }

    public function testSubtract() {
        // Arrange
        $calculator = new Calculator();
        // Act
        $result = $calculator->subtract(8, 3);
        // Assert
        $this->assertEquals(5, $result);
    }

    public function testSubtractWithZero() {
        // Arrange
        $calculator = new Calculator();
    
        // Act & Assert
        $this->expectException(InvalidArgumentException::class);
        $calculator->subtract(-2, 3);
    }
    
    public function testMultiply() {
        // Arrange
        $calculator = new Calculator();
        // Act
        $result = $calculator->multiply(3, 3);
        // Assert
        $this->assertEquals(9, $result);
    }

    public function testMultiplywithZero() {
        // Arrange
        $calculator = new Calculator();
        // Act
        $result = $calculator->multiply(0, 0);
        // Assert
        $this->assertEquals(0, $result);
    }

    public function testDivide() {
        // Arrange
        $calculator = new Calculator();
        // Act
        $result = $calculator->divide(5, 10);
        // Assert
        $this->assertEquals(0.5 , $result);
    }

    public function testDivideZeroA() {
        // Arrange
        $calculator = new Calculator();
        // Act & Assert
        $result = $calculator->divide(0, 10);
        
        $this->assertEquals(0, $result);
    }

    public function testDivideZeroB() {
        // Arrange
        $calculator = new Calculator();
        // Act & Assert
        $this->expectException(InvalidArgumentException::class);
        $calculator->divide(10, 0);
    }



}
