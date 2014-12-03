<?php
/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}