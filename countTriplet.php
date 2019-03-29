<?php

// Complete the countTriplets function below.
function countTriplets($arr, $r) {
    $mp2 = []; // waiting state for 3rd value;
    $mp3 = []; // completed the triplet.
    $res = 0;
    for($i = 0; $i < count($arr); $i++) {
        if (isset($mp3[$arr[$i]])) { //this value completed the triplet
            $res += $mp3[$arr[$i]];
        }
        if (isset($mp2[$arr[$i]])) { // Satisfy 2nd value, wating for 3rd
            if (!isset($mp3[$arr[$i] * $r])) {
                $mp3[$arr[$i] * $r] = 0; //Initialize..
            }
            $mp3[$arr[$i] * $r] += $mp2[$arr[$i]];
        }
        //Each value of array can be the first element of triplet
        //So it's waiting for the 2nd one
        isset($mp2[$arr[$i]*$r]) ? $mp2[$arr[$i] * $r]++ : $mp2[$arr[$i] * $r] = 1;
    }
    return $res;
}

$file_lines = file('input00.txt');

$nr = explode(' ', rtrim($file_lines[0]));

$n = intval($nr[0]);

$r = intval($nr[1]);

$arr_temp = rtrim($file_lines[1]);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$ans = countTriplets($arr, $r);
echo $ans;