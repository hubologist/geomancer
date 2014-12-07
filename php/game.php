<?php

/*
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

/*
 * INDEX
 * 
 * 1.0 includes
 * 2.0 SQL
 * 3.0 main Loop
 * 
 */

/*
 * 1.0 includes
 */

include 'connect.php';  //database connection
include 'settings.php'; //game settings

/*
 * 2.0 SQL
 */

//The only query we'll ever need
$sql = "SELECT iso, name, capital, area, pop, continent, neighbours FROM countries WHERE capital IS NOT NULL";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    //Save data of each row
    while ($row = $result->fetch_assoc()) {
        $countries[] = $row;
    }
} else {
    echo "No results!";
}
$db->close();

/*
 * 3.0 main loop
 */

//randomizeing our list of countries
shuffle($countries);

//total number of countries. PROTIP: 252
$total = range(0, 251);

//simple incremental variable to measure game progress
$i = 0;

//this pulls out a predefined quantity of country ids at random, to serve as our multiple choice options
function getAnswers($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
$options = getAnswers(0, 251, $difficulty); 

//this will fill an array with all available flag images in our image folder
function getFlags() {
    $i = 0;
    foreach (glob('./flag/*.*') as $filename) {
        if (substr($filename, -3) === "png") {
            $flags[$i] = substr($filename, -6, 2);
        }
        echo $flags[$i];
    }
    return $flags[];
}
$flags = getFlags();



$src = './flag/' . $countries[0]["iso"] . '.png';
$bg = 'background-image:url("' . $src . '");';

echo "<div class='flag' style='" . $bg . "'></div>";
echo "<p>" . $countries[$i]["name"] . "</p>";

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
