<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

/*
 * Because we do not have flags for all the countries in our database,
 * we need to select only the ones which do have flags to ensure that a flag is always going to be displayed.
 * This piece of code does just that.
 */

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

//we will not need a db connection again
$db->close();