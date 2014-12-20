<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

$current_score = $_SESSION["score"];
$total_score = $_SESSION["increment"] * $_SESSION["countries"];

$width = intval($current_score * 100 / $total_score);

echo  "<div class='progress'>"
    . "<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='10' style='width: $width%;' id='bar'>"
    . "<span class='sr-only'>0</span>"
    . "</div>"
    . "</div>";