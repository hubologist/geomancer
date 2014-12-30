<?php

/*
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geomancer";

//create connection
$db = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//start session
session_start();
