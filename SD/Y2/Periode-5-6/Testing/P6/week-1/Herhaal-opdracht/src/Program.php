<?php

function calculateAverage($list){
 
    $sum = 0;
    $avg = NULL;

    foreach ($list as $value) {
        $sum += $value; // hier moet een += komen
    }

    $avg = $sum / count($list);

    return $avg;
}
?>
