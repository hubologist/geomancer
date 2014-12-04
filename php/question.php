<?php

/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */



function getQuestion() {
    $rand = mt_rand(0, 3);
    switch ($rand) {
        case 0:
            $question = "What is the capital of ";
            break;
        case 1:
            $question = "Which country does this flag belong to?";
            break;
        case 2:
            $question = "Which of these has the largest area?";
            break;
        case 3:
            $question = "Which of these has the largest population?";
            break;
    }
    return $question;
}