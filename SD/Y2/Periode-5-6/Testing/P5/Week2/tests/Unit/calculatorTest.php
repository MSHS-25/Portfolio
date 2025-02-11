<?php
require_once __DIR__ . "\..\..\src\calculator.php";

class CalculatorTest extends PHPUnit\Framework\TestCase {

    public function testAdd() {
        $calc = new Calculator();
        $getal1 = 5;
        $getal2 = 10;
        $result = $calc->add($getal1, $getal2);
        $this->assertEquals(15, $result);
    }

    public function testSubtract() {
        $calc = new Calculator();
        $getal1 = 10;
        $getal2 = 5;
        $result = $calc->subtract($getal1, $getal2);
        $this->assertNotEquals(5, $result);
    }

    public function testMultiplicate() {
        $calc = new Calculator();
        $getal1 = 4;
        $getal2 = 3;
        $result = $calc->multiplicate($getal1, $getal2);
        $this->assertEquals(12, $result);
    }

    public function testDivide() {
        $calc = new Calculator();
        $getal1 = 10;
        $getal2 = 2;
        $result = $calc->divide($getal1, $getal2);
        $this->assertNotEquals(5, $result);
    }
}
?>
