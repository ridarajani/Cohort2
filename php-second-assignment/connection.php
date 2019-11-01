<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "tahafatima";

    $connection = mysqli_connect($hostname,$username,$password,$database);

    if(!$connection){
        echo "Database not connected.";
    }