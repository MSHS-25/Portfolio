<?php
// voor deze opdracht heb ik https://www.w3schools.in/php/examples/check-palindrome-string gebruikt om de opdracht te maken.

require_once __DIR__ . '/../../src/Program.php';

class ProgramTest extends PHPUnit\Framework\TestCase
{
    public function testSimplePalindroom()
    {   
            // Arrange
        $palindromes = ["lepel", "racecar", "radar", "pap", "negen"];
        
        foreach ($palindromes as $word) {
            // Act
            $result = isPalindrome($word);
            
            // Assert
            $this->assertTrue($result, "$word is een palindroom");
        }
    }

    public function testComplexePalindroom()
    {   
            // Arrange
        $palindromes = ["meetsysteem", "parterretrap"];
        
        foreach ($palindromes as $word) {
            // Act
            $result = isPalindrome($word);
            
            // Assert
            $this->assertTrue($result, "$word is een palindroom");
        }
    }

    public function testNonPalindromeNumbers()
    {
        // Arrange
        $nonPalindromes = [123, 100, 4567, 890, 12, 1010];
        
        foreach ($nonPalindromes as $number) {
            // Act
            $result = isPalindrome($number);
            
            // Assert
            $this->assertFalse($result, "$number is geen palindroomNummer");
        }
    }
}
?>

