<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */




//returns an array with the names of all available flag images (.png type files) in our flag folder
function getFlags() {
    $i = 0;
    foreach (glob("./flag/*.*") as $filename) {
        if (substr($filename, -3) === "png") {
            $flags[$i] = substr($filename, -6, 2);
            $i++;
        }
    }
    return $flags;
}

$flags = getFlags();

//pulling all countries for which we have flags from our database, to ensure that we will always have a flag to display
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



//randomizing our list of countries
shuffle($countries);

//number of selected countries
$total = count($countries);

if(!isset($_SESSION["countries"])) {
    $_SESSION["countries"] = $total;    
}

//intial setup is complete, we will not need a db connection again
$db->close();