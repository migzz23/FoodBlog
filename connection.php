<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "cult_s_kitchen_db";

    if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){

        die("Connection failed!!");
        
    }

?>
