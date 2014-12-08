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

require_once 'connect.php';  //database connection
include 'settings.php'; //game settings

/*
 * 2.0 SQL
 */
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



$options = getOptions(0, $total-1, $difficulty);
$correct = $options[mt_rand(0, $difficulty - 1)];

$src = './flag/' . $countries[$correct]["iso"] . '.png';

$bg = 'background-image:url("' . $src . '");';

echo "<div class='flag' style='" . $bg . "'></div>";

foreach ($options as $id) {
    echo "<a class='btn btn-default' href='index.php?answer=" . $countries[$id]["iso"] . "&correct=" . $countries[$correct]["iso"] . "'>" . $countries[$id]["name"] . "</a>";
}
/*
 * 4.0 main loop
 */

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
