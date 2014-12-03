<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

require_once 'connect.php';

$sql = "SELECT name, capital FROM countries";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["name"] . " - " . $row["capital"] . "<br />";
    }
} else {
    echo "No results!";
}