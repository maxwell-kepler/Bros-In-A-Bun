<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'bro');
    define('DB_PASS', 'bros-in-a-bun-secure-password');
    define('DB_NAME', 'bros');

    //Create connection
    //$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Check connection
    if($con->connect_error) {
        die('Connection Failed ' . $con->connect_error);
    } /*else {
        echo 'Connected to database';
    }*/

    
