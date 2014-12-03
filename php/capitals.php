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

$i = 1;
$random_ids = randomRange(0, 251, 4);

$sql = "SELECT name FROM countries WHERE id = " . $random_ids[0];
$result = $db->query($sql);
$row = $result->fetch_assoc();

echo "<p>What is the capital of " . $row["name"] . "?</p>";

foreach ($random_ids as $id) {
    $sql = "SELECT id, iso, name, capital FROM countries WHERE id = " . $id;
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<p id='" . $row["id"] . "'>" . $i . ". " . $row["capital"] . ".</p>";
        }
    } else {
        echo "No results!";
    }
    $i++;
}