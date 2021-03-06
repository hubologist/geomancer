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

