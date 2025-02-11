<?php
// 21 lines of code
function is_odd_or_even($number) {  // getest .omdat meerdere testen de functie gebruiken
    if ($number % 2 == 0) { //getest . door de getallen 0,2,-3 en 4 in mijn Program.test 
        if ($number == 0) { //getest door test_zero_numbers()
            return "Even";  //getest door test_zero_numbers()
        } elseif ($number > 0) { //getest door test_even_numbers()
            if ($number % 4 == 0) { //getest door test_positive_even_number_dividible_by_4().
                return "Even"; //getest door test_positive_even_number_dividible_by_4().
            } else {
                return "Even"; // getest door test_even_number()
            }
        } else {
            return "Even"; //getest door test_negative_even_number().
        }
    } else {
        if ($number < 0) { //getest door test_negative_odd_number().
            return "Odd"; //getest door test_negative_odd_number().
        } elseif ($number > 0) { //getest door test_odd_number().
            if ($number % 3 == 0) { // getest door test_odd_number() 
                return "Odd";  // getest door test_odd_number() 
            } else {
                return "Odd";  // getest door test_odd_number() 
            }
        } else {
            return "Odd"; // ik ben onzeker over de laatste regel
        }
    }
}
 // 20/21 * 100 = 95.2%
?>