<?php
    require('connection.php');

    if(isset($_GET['Done'])){

        $Done = $_REQUEST['Done'];
        $query = "UPDATE ToDoList set status= 2 where id=".$Done;

        $completed = mysqli_query($connection,$query);

        if(!$completed){
            echo "Error No:".mysqli_connect_errno($completed);
            echo "Error:".mysqli_connect_error($completed);
            die;
        }
        else{
            header("Location: index.php");
        }
    }
?>