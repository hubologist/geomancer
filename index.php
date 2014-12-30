<!DOCTYPE html>

<!--
created by: Tiago @ http://lightradius.com
contact: hi@lightradius.com
-->

<?php

/*
 * Creating and closing our database connection
 */

require_once 'php/connect.php';  //database connection
require_once 'php/check_flags.php';  //stores flag image names in an array
require_once 'php/query.php';  //makes the database query according to the available flags

/*
 * Starting the game
 */

require_once 'php/init.php';  //initialization file
include 'php/settings.php'; //game settings

?>

<html lang="en">
    <head>
        <!-- meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="lightradius.com">
        <meta name="description" content="Flag quiz game">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Free, Game, Geography, Flags, Multiple-choice">

        <!-- title -->
        <title>Geomancer | Geography Quiz</title>

        <!-- bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- custom css -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Geomancer</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Difficulty <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="index.php?difficulty=easy">Easy</a></li>
                                <li><a href="index.php?difficulty=medium">Medium</a></li>
                                <li><a href="index.php?difficulty=hard">Hard</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?reset=true">Restart</a></li>
                        <li><a href="http://lightradius.com">lightradius 2014</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a>SCORE: <span id="score"><?php echo $_SESSION["score"]; ?></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php include 'php/progressbar.php'?>
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="10" style="width: 60%;" id="timer">
                <span class="sr-only">0</span>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-1"></div>
                <div class="col-xs-10">
                    <?php include 'php/showalert.php' ?>
                </div>
                <div class="col-xs-1"></div>
            </div>

            <div class="row">
                <?php include 'php/game.php'; ?>
            </div>       
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>