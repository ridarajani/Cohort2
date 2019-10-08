<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require ('connection.php');
        require ('toDoTable.php');
        
        if(isset($_REQUEST['toAddTask'])){
            $query = "INSERT INTO ToDoList (Task,status) VALUES ('". $_REQUEST['toAddTask'] ."',1)";

            $addTask = mysqli_query($connection,$query);

            if(!$addTask){
                echo "Error No:".mysqli_connect_errno($addTask);
                echo "Error:".mysqli_connect_error($addTask);
                die;
            }
        }
    ?>
    <form method="post">
        <input type="text" name="toAddTask">
        <input type="submit"  value="Add Task">
    </form>

    <?php
        $query = "SELECT * FROM ToDoList";
        
        $ListingTasks= mysqli_query($connection,$query);
        $Tasks = mysqli_fetch_all($ListingTasks,MYSQLI_ASSOC);
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>TASK</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($Tasks as $TKey => $TValue){
    ?>
            <tr>
                <td><?php echo $TValue['id']?></td>
                <td><?php echo $TValue['Task']?></td>
                <td><?php echo $TValue['status'] == 1 ? 'Pending..' : 'Completed' ?></td>
                <td>
                    <a href="editTask.php?toEdit=<?php echo $TValue['id'] ?>&EditKey=<?php echo $TKey ?>">Edit</a>
                    <a href="DeleteTask.php?toDelete=<?php echo $TValue['id'] ?>">Delete</a>
                    <a href="CompletedTask.php?Done=<?php echo $TValue['id'] ?>">Done</a>
                </td>

            </tr>
    <?php
        }
    ?>
        </tbody>
    </table>
</body>
</html>