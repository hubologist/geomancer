<?php

/*
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

require_once 'connect.php'; //database connection
include 'settings.php'; //game settings

//This function will pull out a predefined quantity of country ids at random
function getRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$id = getRange(0, 251, $difficulty);

print_r($country[$id[0]]);















//We will then select one of 5 possible types of question at random
function getQuestion($questionType) {
    $rand = mt_rand(0, 4);

    switch ($rand) {
        case 0: //Best solution is to call a different function on each case
            $question = "What is the capital of ";
            break;
        case 1:
            $question = "Which of the following flags belongs to ";
            break;
        case 2:
            $question = "To which country does this flag belong to?";
            break;
        case 3:
            $question = "Which of these has the largest area?";
            break;
        case 4:
            $question = "Which of these has the largest population?";
            break;
    }
    return $question;
}
