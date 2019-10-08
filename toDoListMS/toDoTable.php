<?php
        require ('connection.php');

        $query = "CREATE TABLE if NOT EXISTS ToDoList (
            id int PRIMARY KEY AUTO_INCREMENT,
            Task varchar(200),
            status int
        )";

        $tableCreation = mysqli_query($connection,$query);

        if(!$tableCreation){
            echo "Error No:".mysqli_connect_errno($tableCreation);
            echo "Error:".mysqli_connect_error($tableCreation);
            die;
        }
?>