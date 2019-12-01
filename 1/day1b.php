<?php

/*************************
 * Day 1, part B: AoC 2019
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

    //Calculates fuel on the added fuel, repeating until 0 or negative.
    while($individual >=0 ) {

        $total+= $individual;
        $individual = floor($individual/3)-2;

    }

}

echo $total;

?>