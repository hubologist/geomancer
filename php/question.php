<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

require_once 'connect.php';

//The difficulty level simply determines the number of options a player will have to choose from.
//Easy = 4 options, Medium = 6 options, Hard = 8 options

$difficulty = 4;

//We will randomly select a number of ids corresponding to the selected difficulty level
//The range is 0 to 251 because there are 252 countries in total

function randomRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$selected = randomRange(0, 251, $difficulty); 

//First, $difficulty countries and their respective data
//will be pulled at random from the database.

foreach ($selected as $id) {
    $sql = "SELECT name, capital, area, pop, continent, neighbours FROM countries WHERE id = " . $id;
    $result = $db->query($sql);
    $row[$id] = $result->fetch_assoc();
}

foreach ($row as $country) {
    foreach ($country as $data) {
        echo $data . "<br />";
    }
}

//This function simply selects one question structure at random
function getQuestion() {
    $rand = mt_rand(0, 3);
    
    switch ($rand) {
        case 0:
            $question = "What is the capital of ";
            break;
        case 1:
            $question = "Which of the following flags belongs to ";
            break;
        case 1:
            $question = "To which country does this flag belong to?";
            break;
        case 2:
            $question = "Which of these has the largest area?";
            break;
        case 3:
            $question = "Which of these has the largest population?";
            break;
    }
    return $question;
}

echo getQuestion();