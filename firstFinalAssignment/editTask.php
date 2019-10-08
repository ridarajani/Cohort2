<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
    </header>
    <main>
        <?php 
            $taskToChange = [];
            if(isset($_COOKIE['taskList'])){
                $edit  = $_GET['editingTask'];
                $decodedTaskList = base64_decode($_COOKIE['taskList']);
                $UnserializedTaskList = unserialize($decodedTaskList);
                $taskToChange = $UnserializedTaskList[$edit];
            }
        ?>
            <div>
                <form method="post">
                    <div>
                        <input type="text" name="toChange" value="<?php echo $taskToChange;?>">
                    </div>
                    <div>
                        <input type="submit" name="changedTask" value="Edit Task" >
                    </div>
                </form>
            </div>

        <?php
         if(isset($_REQUEST['changedTask'])){
            $decodedTaskList = base64_decode($_COOKIE['taskList']);
            $UnserializedTaskList = unserialize($decodedTaskList);
            $taskToChange = $_POST['toChange'];
            $UnserializedTaskList[$edit] = $taskToChange;
            $serializedTaskList = serialize($UnserializedTaskList);
            $encodedTaskList = base64_encode($serializedTaskList);
            setcookie( 'taskList' , $encodedTaskList , time() + 60*60*24 , "/" );
            header("Location: toDoList.php");
        }
        ?>    
    </main>
    <footer>
    </footer>

</body>
</html>