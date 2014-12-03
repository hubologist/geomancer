<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

require_once 'connect.php';

$sql = "SELECT iso, name, capital FROM countries WHERE  id = 56";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<img src='flags/" . $row["iso"] . ".png' alt='" . $row["name"] . "'/>";
    }
} else {
    echo "No results!";
}