<?php
    require ('connection.php');

    $del_id  = $_POST['delete_id'];

    $query   = "DELETE FROM info_list WHERE id=$del_id";
    $deleted = mysqli_query($connection,$query);

    if(!$deleted){
        echo "Record not deleted";
    }
    else{
        echo 1;
    }