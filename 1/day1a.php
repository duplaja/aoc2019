<?php
/*************************
 * Day 1, part A: AoC 2019
 ************************/

 //Get All Inputs as Array
$lines = file('day1input.txt');


//Tracks total fuel needed
$total = 0;

foreach ($lines as $line) {
    
    //Strip out any whitespace and newlines
    $mass = str_replace(array("\n", "\r", " "), '', $line);

    //Calculate fuel needed based on formula from problem
    $individual = floor($mass/3)-2;

    //Add to the total fuel required
    $total+= $individual;

}

echo $total;

?>
