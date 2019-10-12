<?php

    $server_name = "localhost";
    $user_name   = "root";
    $password    = "";
    $dbname      = "tahafatima";

    $connection = mysqli_connect($server_name,$user_name,$password,$dbname);

    if(!$connection){
        echo "Not Connected"; die;        
    }