<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

if(isset($_POST["submit"])) {
    $answer = $_POST["submit"];
    $correct = $_SESSION["correct"];
    if ($answer === $correct) {
        echo "<div class='alert alert-success' role='alert'>"
           . "<p>CORRECT!</p>"
           . "</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>"
           . "<p>WRONG!</p>"
           . "</div>";
    }
} else {
    echo "<div class='alert alert-info' role='alert'>"
       . "<p>Which country does this flag belong to? Quick!</p>"
       . "</div>";    
}

