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



$options = getOptions(0, $total - 1, $difficulty);
$correct = $options[mt_rand(0, $difficulty - 1)];
$src = './flag/' . strtolower($countries[$correct]["iso"]) . '.png';
$bg = 'background-image:url("' . $src . '");';
$_SESSION["correct"] = $countries[$correct]['name'];

echo  "<div class='row'>"
    . "<div class='col-xs-1'></div>"
    . "<div class='col-xs-10 flag-container'>" . "<div class='flag' style='" . $bg . "'></div>" . "</div>"
    . "<div class='col-xs-1'></div>"
    . "</div>";

echo "<form action='index.php' method='post'>";

$i = 2;

foreach ($options as $id) {
    if ($i % 2 !== 0) {
        echo "<div class='row'>";
    }
    echo "<div class='col-xs-1'></div><div class='col-xs-4'><input class='btn btn-default' type='submit' name='submit' value='" . $countries[$id]['name'] . "'/></div><div class='col-xs-1'></div>";
    if ($i % 2 !== 0) {
        echo "</div>";
        echo "<div class='separator'></div>";
    }
    $i++;
}

echo "</form>";

