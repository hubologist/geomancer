<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

//The difficulty level simply determines the number of options a player will have to choose from.
//Easy = 4 options, Medium = 6 options, Hard = 8 options. Default is easy.

if(isset($_POST["difficulty"])) {
    $difficulty = $_POST["difficulty"];
} else {
    $difficulty = 4;
}

if(isset($_POST["questionType"])) {
    $questionType = $_POST["questionType"];
} else {
    $questionType = "random";
}

//this function simply gets the names of all available flag images in our flag folder
//we will only pull countries for which we have flags from our database

function getFlags() {
    $i = 0;
    foreach (glob("./flag/*.*") as $filename) {
        if (substr($filename, -3) === "png") {
            $flags[$i] = substr($filename, -6, 2);
            $i++;
        }
    }
    return $flags;
}

$flags = getFlags();