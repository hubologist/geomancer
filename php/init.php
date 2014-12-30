<?php

/*
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */


/*
 * Helper functions
 */

//randomizing our list of countries
shuffle($countries);

//number of selected countries
$total = count($countries);

if (!isset($_SESSION["countries"])) {
    $_SESSION["countries"] = $total;
}


