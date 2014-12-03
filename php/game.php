<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

require_once 'connect.php';
$rand = mt_rand (0, 251);

$sql = "SELECT iso, name, capital FROM countries WHERE id = " . $rand;
$result = $db->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<img src='flags/" . $row["iso"] . ".png' alt='" . $row["name"] . "'/>";
    }
} else {
    echo "No results!";
}