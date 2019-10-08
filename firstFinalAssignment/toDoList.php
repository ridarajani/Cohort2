<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/07f52386ae.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        if(isset($_SESSION['Name']) && !empty($_SESSION['Name'])){
            if(isset($_REQUEST['taskSubmit'])){
                $Task = [];
                $toDo = $_REQUEST['Task'];
                if(!isset($_COOKIE['taskList']) && empty($_COOKIE['taskList'])){
                    $Task['Task'] = $toDo;
                    $Task['status'] = "1";
                    print_r($Task);die;
                    $serializedTaskList = serialize($Task);
                    $encodedTaskList = base64_encode($serializedTaskList);
                    
                    setcookie('taskList',$encodedTaskList,time()+86400*30,"/");
                }
                else{
                    $decodedTaskList = base64_decode($_COOKIE['taskList']);
                    $UnserializedTaskList = unserialize($decodedTaskList);
                    $UnserializedTaskList[] = $toDo;

                    $serializedTaskList = serialize($UnserializedTaskList);
                    $encodedTaskList = base64_encode($serializedTaskList);

                    setcookie('taskList',$encodedTaskList,time()+86400*30,"/");
                }
            }
        ?>
        <h2>
            Hello, <?php echo $_SESSION['Name']; ?>!
        </h2>
        <div>
            <form>
                <input type="text" name="Task">
                <input type="submit" value="Add Task" name="taskSubmit">
            </form>
        </div>
        <ul>
        <?php
            $ArrOfKeys = [];
            if(isset($_COOKIE['taskList'])){
                $decodedTaskList = base64_decode($_COOKIE['taskList']);
                $UnserializedTaskList = unserialize($decodedTaskList);
                foreach($UnserializedTaskList as $Key => $Value){
                    $ArrOfKeys[] = $Key;
                    print_r($ArrOfKeys);
        ?>
            <li>
                    <div  style="<?php
                        if(isset($_SESSION['taskCompleted'])){
                            if(isset($_COOKIE['TaskComplete'])){
                                $decodedCompletedTask = base64_decode($_COOKIE['TaskComplete']);
                                $UnserializedCompletedTask = unserialize($decodedCompletedTask);
                            }
                            foreach($ArrOfKeys as $AValue){
                                foreach($UnserializedCompletedTask as $SValue){
                                    if($AValue == $SValue){
                                        echo "background:green; color:white";
                                        break;
                                    }
                                }
                            }
                        }
                                ?>">
                            <?php echo $Value; ?>
                    </div>
                <div>
                    <a href="editTask.php?editingTask=<?php echo $Key; ?>"><i class="fas fa-edit"></i></a>
                    <a href="deleteTask.php?delete=<?php echo $Key; ?>"><i class="fas fa-trash"></i></a>
                    <a href="taskDone.php?taskCompleted=<?php echo $Key; ?>"><i class="fas fa-check"></i></a>
                </div>
            </li>
    <?php
            }
        }
    ?>
    </ul>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
    <?php
        }
        else{
            $_SESSION['NotLogged'] = true;
            header('Location: index.php');
        }
    ?>
</body>
</html>