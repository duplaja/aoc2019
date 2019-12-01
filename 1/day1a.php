<?php

$lines = file('day1input.txt');

$total = 0;

foreach ($lines as $line) {
    
    $mass = str_replace(array("\n", "\r", " "), '', $line);


    $individual = floor($mass/3)-2;

    $total+= $individual;

}

echo $total;

?>
