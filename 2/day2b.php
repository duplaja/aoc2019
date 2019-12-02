<?php

//Data  given
$starting_string = '1,0,0,3,1,1,2,3,1,3,4,3,1,5,0,3,2,9,1,19,1,19,5,23,1,9,23,27,2,27,6,31,1,5,31,35,2,9,35,39,2,6,39,43,2,43,13,47,2,13,47,51,1,10,51,55,1,9,55,59,1,6,59,63,2,63,9,67,1,67,6,71,1,71,13,75,1,6,75,79,1,9,79,83,2,9,83,87,1,87,6,91,1,91,13,95,2,6,95,99,1,10,99,103,2,103,9,107,1,6,107,111,1,10,111,115,2,6,115,119,1,5,119,123,1,123,13,127,1,127,5,131,1,6,131,135,2,135,13,139,1,139,2,143,1,143,10,0,99,2,0,14,0';

//Convert String to Array
$starting_array = explode(',',$starting_string);

/****************
 * Once you have a working computer, the first step is to restore the gravity assist program (your puzzle input) 
 * to the "1202 program alarm" state it had just before the last computer caught fire. 
 * To do this, before running the program, replace position 1 with the value 12 and replace position 2 with the value 2.
 **********************/

 //Brute Force: Check all possible values of array keys 1 and 2, between 1 and 99. Stop when found
 //Wraps the same code from day2a in a loop
 for($i=0;$i<=99;$i++) {

    for($z=0;$z<=99;$z++) {

        $initial_array = $starting_array;

        //Restore to Pre-Fire state
        $initial_array[1] = $i;
        $initial_array[2] = $z;

        $current_position = 0;

        while($current_position <= count($initial_array)) {

            $opcode = $initial_array[$current_position];


            if($opcode == 99) { 
                
                break; 
            }

            $start = $initial_array[$current_position+1];
            $stop = $initial_array[$current_position+2];

            $storage_number = $initial_array[$current_position+3];

            //Gets the value of the operation
            $value_returned = current_operation($opcode,$start,$stop,$initial_array);

            //Saves it to the appropriate place
            $initial_array[$storage_number] = $value_returned;

            //Steps forward to next line of code
            $current_position+=4;


        }

        if($initial_array[0] == 19690720) {
            echo 100*$i+$z;
            break(2);
        }
    }
 }


//Returns the value the opcode and the start / stop require
function current_operation($opcode,$start,$stop,$current_array) {
    if($opcode == 1) {

        return $current_array[$start]+$current_array[$stop];

    } elseif ($opcode == 2) {

        return $current_array[$start]*$current_array[$stop];

    } 
    //Shouldn't happen
    elseif ($opcode == 99) {
        return -10000;
    }
}

?>