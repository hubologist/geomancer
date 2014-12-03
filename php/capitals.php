<?php

/*
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

require_once 'connect.php';

function randomRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function randomColor() {
    /* the following snippet generates pastel colors by averaging a randomly
     * generated value between 0 and 255 with another, customizable, color */
    $r = intval((mt_rand(0, 255) + 128) / 2);
    $g = intval((mt_rand(0, 255) + 128) / 2);
    $b = intval((mt_rand(0, 255) + 255) / 2);
    return $r . ", " . $g . ", " . $b;
}

$i = 1;
$random_ids = randomRange(0, 251, 4);

$sql = "SELECT name FROM countries WHERE id = " . $random_ids[0];
$result = $db->query($sql);
$row = $result->fetch_assoc();

echo "<div class='jumbotron' style='background: rgba(" . randomColor() . ",0.3);'><p>What is the capital of " . $row["name"] . "?</p></div>";

foreach ($random_ids as $id) {
    $sql = "SELECT id, iso, name, capital FROM countries WHERE id = " . $id;
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<p id='" . $row["id"] . "'>" . $i . ". " . $row["capital"] . "</p>";
        }
    } else {
        echo "No results!";
    }
    $i++;
}