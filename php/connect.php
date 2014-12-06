<?php

/*
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geomancer";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error . "<br />");
}

//The only query we'll ever need
$sql = "SELECT iso, name, capital, area, pop, continent, neighbours FROM countries WHERE capital IS NOT NULL";
$result = $db->query($sql);
//For each randomly selected id, we will select the corresponding row and store it in a multidimensional array
if ($result->num_rows > 0) {
    // Save data of each row
    while ($row = $result->fetch_assoc()) {
        $country[] = $row;
    }
} else {
    echo "No results!";
}
$db->close();