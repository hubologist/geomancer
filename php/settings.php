<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */
        
$score = 3;

//The difficulty level simply determines the number of options a player will have to choose from.
//Easy = 4 options, Medium = 6 options, Hard = 8 options. Default is easy.

if(!isset($_SESSION["difficulty"])) {
    $_SESSION["difficulty"] = 4;
}

if(isset($_GET["difficulty"])) {
    $setting = $_GET["difficulty"];
    switch ($setting) {
        case "easy":
            $_SESSION["difficulty"] = 4;
            break;
        case "medium":
            $_SESSION["difficulty"] = 6;
            break;
        case "hard":
            $_SESSION["difficulty"] = 8;
            break;
    }
}

$difficulty = $_SESSION["difficulty"];

if(isset($_GET["reset"])) {
    $reset = $_GET["reset"];
    if ($reset === "true") {
        session_destroy();
        session_start();
        $_SESSION["score"] = 0;
    }
}

if(isset($_POST["submit"])) {
    $answer = $_POST["submit"];
    $correct = $_SESSION["correct"];
    if ($answer === $correct) {
        $_SESSION["score"] += $score;
    }
}

//this pulls out a predefined quantity of country ids at random, to serve as our multiple choice options
function getOptions($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
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