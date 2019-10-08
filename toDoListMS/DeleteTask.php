<?php
    require('connection.php');

    if(isset($_GET['toDelete'])){

        $toBeDeleted = $_REQUEST['toDelete'];
        $query = "DELETE FROM ToDoList where id=".$toBeDeleted;

        $deletion = mysqli_query($connection,$query);

        if(!$deletion){
            echo "Error No:".mysqli_connect_errno($deletion);
            echo "Error:".mysqli_connect_error($deletion);
            die;
        }
        else{
            header("Location: index.php");
        }
    }
?>