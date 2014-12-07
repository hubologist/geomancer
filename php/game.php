<?php

/*
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

require_once 'connect.php'; //database connection
include 'settings.php'; //game settings

//The only query we'll ever need
$sql = "SELECT iso, name, capital, area, pop, continent, neighbours FROM countries WHERE capital IS NOT NULL";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    //Save data of each row
    while ($row = $result->fetch_assoc()) {
        $country[] = $row;
    }
} else {
    echo "No results!";
}
$db->close();
shuffle($country); //randomized list of countries

$total = range(0, 251); //total number of countries PROTIP: 252
$i = 0; //Simple incremental variable to measure game progress
$options = getAnswers(0, 251, $difficulty);

//This function will pull out a predefined quantity of country ids at random
function getAnswers($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function removeBrokenLinks($arr) {
    foreach ($arr as $index) {
        $src = './flag/' . $index["iso"] . '.png';
        list($width, $height) = @getimagesize($src);

        if ($height === NULL || $width === NULL) {
            unset($arr[$index]);
            $arr = array_values($arr);
        }    
    }
}

$country = removeBrokenLinks($country);

$bg = 'background-image:url("' . $src . '");';

echo "<div class='flag' style='" . $bg . "'></div>";
echo "<p>" . $country[$i]["name"] . "</p>";













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
