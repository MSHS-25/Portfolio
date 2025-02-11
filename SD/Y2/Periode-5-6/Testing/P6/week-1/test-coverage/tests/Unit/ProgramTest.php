<?php

require_once __DIR__ . '/../../src/Program.php';

class ProgramTest extends PHPUnit\Framework\TestCase
{
    public function test_even_number() {
        // Arrange
        $number = 2;
        // Act
        $result = is_odd_or_even($number);
        // Assert
        $this->assertEquals("Even", $result);
    }

    public function test_odd_number() {
        // Arrange
        $number = 3;
        // Act
        $result = is_odd_or_even($number);
        // Assert
        $this->assertEquals("Odd", $result);
    }

    public function test_zero_number() {
        // Arrange
        $number = 0;
        // Act
        $result = is_odd_or_even($number);
        // Assert
        $this->assertEquals("Even", $result);
    }

    public function test_negative_even_number() {
        // Arrange
        $number = -2;
        // Act
        $result = is_odd_or_even($number);
        // Assert
        $this->assertEquals("Even", $result);
    }

    public function test_negative_odd_number() {
        // Arrange
        $number = -3;
        // Act
        $result = is_odd_or_even($number);
        // Assert
        $this->assertEquals("Odd", $result);
    }

    public function test_negative_zero_number() {
        // Arrange
        $number = -0;
        // Act
        $result = is_odd_or_even($number);
        // Assert
        $this->assertEquals("Even", $result);
    }

    public function test_positive_even_number_divisible_by_4() {
        // Arrange
        $number = 4;
        // Act
        $result = is_odd_or_even($number);
        // Assert
        $this->assertEquals("Even", $result);
    }

}

?>