<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */


//The difficulty level simply determines the number of options a player will have to choose from.
//Easy = 4 options, Medium = 6 options, Hard = 8 options. Default is easy.

if(!isset($_SESSION["difficulty"])) {
    $_SESSION["difficulty"] = 4;
}

if(!isset($_SESSION["increment"])) {
    $_SESSION["increment"] = 7; 
}

if(!isset($_SESSION["score"])) {
    $_SESSION["score"] = 0; 
}

if(isset($_GET["difficulty"])) {
    $setting = $_GET["difficulty"];
    switch ($setting) {
        case "easy":
            $_SESSION["difficulty"] = 4;
            $_SESSION["increment"] = 7;
            break;
        case "medium":
            $_SESSION["difficulty"] = 6;
            $_SESSION["increment"] = 12;
            break;
        case "hard":
            $_SESSION["difficulty"] = 8;
            $_SESSION["increment"] = 17;
            break;
    }
}

$difficulty = $_SESSION["difficulty"];
$score = $_SESSION["increment"];

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

$flags = getFlags();

//pulling all countries for which we have flags from our database
for ($i = 0; $i < count($flags); $i++) {
    $sql = "SELECT iso, name, capital, area, pop, continent, neighbours FROM countries WHERE capital IS NOT NULL AND iso = '" . $flags[$i] . "'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $countries[$i] = $row;
    } else {
        echo "<br />No results for " . $flags[$i];
    }
}

$db->close();

/*
 * 3.0 globals and helper functions
 */

//randomizing our list of countries
shuffle($countries);

//number of selected countries
$total = count($countries);

if(!isset($_SESSION["countries"])) {
    $_SESSION["countries"] = $total;    
}