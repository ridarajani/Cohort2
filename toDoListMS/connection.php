<?php
    $server_name = 'localhost';
    $username    = 'root';
    $password    = '';
    $dbname      = 'tahafatima';

    $connection = mysqli_connect($server_name,$username,$password,$dbname);

    if(!$connection){
        echo "Error No:".mysqli_connect_errno();
        echo "Error:".mysqli_connect_error();
        die;
    }
?>