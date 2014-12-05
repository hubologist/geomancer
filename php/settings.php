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