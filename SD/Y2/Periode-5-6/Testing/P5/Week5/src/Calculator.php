<?php
   //1e line coverage is 42,9%
   //2e line coverage is 52,4% 11/21



   class Calculator { //Uitgevoerd [23,8%, 5/21]
    public function add($a, $b) { //uitgevoerd
        if ($a < 0 || $b < 0) { //uitgevoerd
            throw new InvalidArgumentException("Negative numbers not supported"); //uitgevoerd
        }
        return $a + $b;// uitgevoerd
    }

    //1e line coverage 9/21 = 42,9%. 
    //2e line coverage 11/21 = 52,4%
    public function subtract($a, $b) { //uitgevoerd  
        if ($a < 0 || $b < 0) {  //uitgevoerd
            throw new InvalidArgumentException("Negative numbers not supported"); //uitgevoerd
        }
        if ($a < $b) { //uitgevoerd
            throw new InvalidArgumentException("Result would be negative"); //uitgevoerd
        }
        return $a - $b; //uitgevoerd
    }

    //2e line coverage is 71,4% 15/21
    public function multiply($a, $b) { //uitgevoerd 
        if ($a == 0 || $b == 0) { // uitgevoerd
            return 0;   // uitgevoerd
        }
        return $a * $b; // uitgevoerd
    }

    public function divide($a, $b) { //uitgevoerd // 100$ 21/21
        if ($b == 0) { //uitgevoerd
            throw new InvalidArgumentException("Cannot divide by zero"); //uitgevoerd
        }
        if ($a == 0) {// uitgevoerd
            return 0; // uitgevoerd
        }
        return $a / $b; //uitgevoerd
    }
}

