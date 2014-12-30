<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

//returns an array with the names of all available flag images (.png type files) in our flag folder
function getFlags() {
    $i = 0;
    foreach (glob("./flag/*.*") as $filename) {
        if (substr($filename, -3) === "png") {
            $array[$i] = substr($filename, -6, 2);
            $i++;
        }
    }
    return $array;
}

$flags = getFlags();