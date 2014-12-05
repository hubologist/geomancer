<?php

/*
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

require_once 'connect.php'; //database connection
include 'settings.php'; //game settings

//We will randomly select a number of ids corresponding to the selected difficulty level.
//The range is 0 to 251 because there are 252 countries in total.

function randomRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$idSelection = randomRange(0, 251, $difficulty);

//First, $difficulty countries and their respective data
//will be pulled at random from the database.

function getCountries($db, $selected) {
    foreach ($selected as $id) {
        $sql = "SELECT iso, name, capital, area, pop, continent, neighbours FROM countries WHERE capital IS NOT NULL AND id = " . $id;
        $result = $db->query($sql);
        //For each randomly selected id, we will select the corresponding row and store it in a multidimensional array
        $row[$id] = $result->fetch_assoc();
    }
    return $row;
}

$country_data = getCountries($db, $idSelection);
$first_country = current(array_filter($country_data));

echo "<img src='./flags/" . $first_country["iso"] . ".png'>";

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

echo getQuestion($questionType);
