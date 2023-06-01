<?php

function countMax($array) {
    $maxCount = 0; 
    $count = 0; 
    
    foreach ($array as $value) {
        if ($value == 1) {
            $count++; 
            $maxCount = max($maxCount, $count); 
        } else {
            $count = 0; 
        }
    }
    return $maxCount;
}

$array = array(1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1);
$maxConsecutiveOnes = countMax($array);
echo "Максимальное количество последовательных единиц: " . $maxConsecutiveOnes;

